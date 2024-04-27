<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("classes.php");

function checkLogin($conn, $pfType)
{
    if (isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("SELECT * FROM $pfType WHERE user_id = ? LIMIT 1");
        $stmt->execute([$user_id]);

        $user_data = $stmt->fetch();

        if ($pfType == "travelnursesdb")
        {
            $user = new TravelNurse($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5],$user_data[7],$user_data[8]);
        }
        else
        {
            $user = new PropertyOwner($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5], $user_data[7], $user_data[8]);
        }
        return $user;
    }
    header('Location: index.php');
    die;
}

function randomNum($length,$pfType,$conn)
{
    $newId = "";
    for ($i = 0; $i < $length; $i++)
    {
        $newId .= rand(0,9);
    }
    $stmt = $conn->prepare("SELECT id FROM $pfType WHERE user_id = ? LIMIT 1");
    $stmt->execute([$newId]);
    if ($stmt->rowCount() == 1)
        {
            return randomNum($length, $pfType, $conn);
        }
    return $newId;
}

function checkIfEmailInUse( $conn, $email)
{
    $stmt = $conn->prepare("SELECT * FROM travelnursesdb WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 1)
    {
        return true;
    }
    $stmt = $conn->prepare("SELECT * FROM propertyownersdb WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    if ($stmt->rowCount() == 1)
    {
        return true;
    }
    return false;
}

function getListings($conn, $query, $data)
{
    // prepare statement
    $stmt = $conn->prepare($query);

    foreach ($data as $key => $value)
{
        $stmt->bindParam($key, $data[$key], PDO::PARAM_STR);
    }

    // get listings db as array
    $stmt->execute();
    $listingsStmt = $stmt->fetchAll(PDO::FETCH_NUM);

    // get listings images
    $images = getImagesForListings($conn);

    // get listings ratings
    $stmt = $conn->prepare('SELECT * FROM ratings');
    $stmt->execute();
    $ratings = $stmt->fetchAll(PDO::FETCH_NUM);

    $listings = array();

    for ($listing = 0; $listing < count($listingsStmt); $listing++)
    {
        // calculate ratings
        $rating = calculateRatings($ratings, $listingsStmt[$listing][2]);

        // create listing object
        $newListing = new Listing($listingsStmt[$listing][1],$listingsStmt[$listing][2],$listingsStmt[$listing][3],$listingsStmt[$listing][4],$listingsStmt[$listing][5],$listingsStmt[$listing][6],$listingsStmt[$listing][7], $listingsStmt[$listing][8], $rating);

        for ($image = 0; $image < count($images); $image++)
        {
            if ($images[$image]->address === $newListing->address)
            {
                $newListing->addImage($images[$image]);
            }
        }

        // push new listing object to listings array
        array_push($listings, $newListing);
    }

    return $listings;
}
function calculateRatings($ratings, $listingAddress)
{
    $listingRating = 0;
    $count = 0;

    for ($rating = 0; $rating < count($ratings); $rating++)
    {
        // get rating for listing
        if ($ratings[$rating][1] == $listingAddress)
        {
            $listingRating = $listingRating + $ratings[$rating][3];
            $count = $count + 1;
        }
    }

    if ($count == 0)
    {
        return 0;
    }

    return round($listingRating / $count,0);
}
function getImagesForListings($conn)
{
    require('vendor/autoload.php');

    $s3 = new Aws\S3\S3Client([
        'version'  => 'latest',
        'region'   => 'us-west-1',
    ]);

    $bucket = 'listingimagesdb';

    $stmt = $conn->prepare('SELECT * FROM listingimagedb');
    $stmt->execute();
    $imagesStmt = $stmt->fetchAll(PDO::FETCH_NUM);

    $images = array();

    for ($image = 0; $image < count($imagesStmt); $image++)
    {
        $filename = $imagesStmt[$image][2];
        $file = $s3->getObject([
                                 'Bucket' => $bucket,
                                 'Key' => $filename,
                                ]);
        
        $file = $file->get('@metadata')['effectiveUri'];

        // create image object
        $newImage = new Image($imagesStmt[$image][1], $imagesStmt[$image][2], $file);

        // push new image object to images array
        array_push($images, $newImage);
    }

    return $images;
}

// function that check if a user's listings are have been reserved
function checkListingsAvailability($listings)
{
    for ($listing = 0; $listing < count($listings); $listing++)
    {
        if ($listings[$listing]->availability == "reserved")
        {
            return true;
        }
    }

    return false;
}

//Displays the filled icon if there is a message
//Include the notificaiton Message .php file if the message plag is true
function newMessageIcon($newMessageFlag)
{
    
    //if there is a new message
    if ($newMessageFlag)
    {
        //Let the user to access messages
        //if there is a new messgae then the bell will shake
        echo '<i id = "bell" class="fa-solid fa-bell fa-shake fa-2xl" style="color: #ffffff;"></i>';


    }
    //otherwise, there is no new message
    else
    {
        //let the user to access messages
        echo '<a href = "messages.php">';
        //no new messages -> no shake
        echo '<i class="fa-regular fa-bell fa-2xl" style="color: #ffffff;"></i>';
        echo '</a>';
    }
}

function displayStar ($rating)
{
    $rating = round($rating);
    for ($index = 0; $index < $rating; $index++)
    {
        echo '<i class="fa-solid fa-star fa-lg" style="color: #FFD43B;"></i>';
    }
    for ($index = 0; $index < 5 - $rating; $index++)
    {
        echo '<i class="fa-regular fa-star fa-lg" style="color: #FFD43B;"></i>';
    }

}



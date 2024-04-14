<?php
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
            $user = new TravelNurse($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5],$user_data[7]);
        }
        else
        {
            $user = new PropertyOwner($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5]);
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

function getListings($conn, $query)
{
    // get listings db as array
    $query->execute();
    $listingsStmt = $query->fetchAll(PDO::FETCH_NUM);

    $images = getImagesForListings($conn);

    $listings = array();

    for ($listing = 0; $listing < count($listingsStmt); $listing++)
    {
        // create listing object
        $newListing = new Listing($listingsStmt[$listing][2],$listingsStmt[$listing][3],$listingsStmt[$listing][4],$listingsStmt[$listing][5],$listingsStmt[$listing][6],$listingsStmt[$listing][7]);

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

//Displays the filled icon if there is a message
$newMessageFlag = true;
function newMessageIcon($newMessageFlag)
{
    //if there is a new message
    if ($newMessageFlag)
    {
        //display the shake Bell icon
        echo '<i class="fa-solid fa-bell fa-shake fa-2xl" style="color: #ffffff;"></i>';
    }
    //otherwise, there is no new message
    else
    {
        echo '<i class="fa-regular fa-bell fa-2xl" style="color: #ffffff;"></i>';
    }
}

// get verification status from certdb
function getVerificationStatus($conn, $user_id)
{
    // statement to get user's status
    $stmt = $conn->prepare("SELECT approved FROM certdb WHERE user_id = ?");
    $stmt->execute([$user_id]);

    // get the result
    $approved = $stmt->fetchColumn();

    // close statement
    $stmt->close();

    // if the user is approved, return true, otherwise false
    return ($approved == 1) ? true : false;

}
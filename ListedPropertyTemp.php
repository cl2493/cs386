<?php

session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_SESSION['pfType']))
{
    $user = checkLogin($conn,$_SESSION['pfType']);
    $verifiedFlag = false;
}
else
{
    header("Location: index.php");
    exit();
}

// get listing that user clicked on
$query = "SELECT * FROM listingsdb WHERE address = :address";
$data[':address'] = $_GET['Listing'];
$listings = getListings($conn, $query, $data);
$selectedListing = $listings[0];

// if the reserve button is pressed
if (array_key_exists('reserve',$_POST))
{
    // reserve property for current user
    $result = $selectedListing->changeAvailability($conn, $user->user_id);

    // reservation was requested
    if ($result)
    {
        // tell travel nurse that they have requested a reservation
        notifyUser($conn, 1, $user->user_id, 'travelnursesdb');
    }
}

// if tn clicked rate listing
if (isset($_POST['rate-Btn']))
{
    // rate listing
    $user->rateListing($conn, $selectedListing, $_POST['rating']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Nurse Profile</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle(PO).css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer></script>
</head>
<!-- Body of the page -->
<body>
    <!-- Top of the page -->
    <?php include('header.php'); ?>
<!------------------------------------Listing Page------------------------------------>
    <div class="profile-container">
        <div class = "profile-content">
            <!-- Profile header -->
            <div class="profile-header">
                <!-- Profile picture -->

                <!-- Profile name -->
                <div id="listing-picture">
                    <img src="<?=$selectedListing->images[0]->image?>" class="property-image">
                </div>
                <!-- Profile name -->
                <?php
                // Display the verified icon if the user is verified
                if ($verifiedFlag) {
                echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                }
                // Close the strong tag
                echo "</strong></h2>";
                ?>
            </div>

            <!-- listing information -->
            <div class="listing-info">
                <!-- listing image source & address -->
                <h6 id=""><?=$selectedListing->address?></h6>
            
            <!-- Amenities information -->
            <p><strong>Bedrooms: <?=$selectedListing->bed?></strong></p>
            <p><strong>Bathrooms: <?=$selectedListing->bath?></strong></p>
            <p><strong>Monthly Cost: $<?=$selectedListing->price?></strong></p>
            <!-- lstar rating display -->
            <?php
            // only show rate button if user is travelnurse and if they have reserved property
            if ($user->pfType == "travelnursesdb" && array_key_exists($selectedListing->address, $user->ratings))
            {
                echo '
                <form method="post" class="rating-form">Rating: 
                    <span class="star-rating">
                        <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-1" value="1">
                        <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-2" value="2" checked>
                        <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-3" value="3">
                        <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-4" value="4">
                        <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                        <input type="radio" name="rating" id="rate-5" value="5">
                    <button name="rate-Btn" type= "submit" class="submit-btn">Rate</button>
                </form>
                ';
            }
            else
            {
                echo "<p>Rating: ";
                displayStar($selectedListing->rating);
                echo "</p>";
            }
            ?>
            </div>
            <?php
            // display reserve button if user is a travel nurse and isn't reserving a property now.
            if ($user->pfType == "travelnursesdb" && $user->messageFlag != 1 && $user->reservedProperty == NULL)
            {
            ?>
                <form method="post">
                <input type="submit" name="reserve" class="reserve-btn" id = "reserve" value="Reserve">          
                </form>
            <?php
            }
            ?>
           </div>
        </div>
    </div>
   
    <!------ footer ----->
    <?php include("footer.php"); ?>
</body>
</html>

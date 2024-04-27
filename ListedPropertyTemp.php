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

// set the button message to reserve if it is not set
if (!isset($buttonMessage))
{
    $buttonMessage = 'Reserve';
}

// get listing that user clicked on
$query = "SELECT * FROM listingsdb WHERE address = :address";
$data[':address'] = $_GET['Listing'];
$listings = getListings($conn, $query, $data);
$selectedListing = $listings[0];
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
        if ($user->pfType == "travelnursesdb")
        {
        ?>
        <form action="rate.php?Listing=<?=$selectedListing?>" method="post" class="rating-form">Rating: <span class="star-rating">
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
            </span>
        <button name="rate-Btn" type= "submit" class="submit-btn">rate</button>
        </form>
        <?php
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
            // if the reserve button is pressed
            if (array_key_exists('reserve',$_POST) && $buttonMessage == 'Reserve')
            {
                // if the user is a travel nurse
                if ($user->pfType == 'travelnursesdb')
                {
                    // reserve property for current user
                    $selectedListing->changeAvailability($conn, $user->user_id);
                    // change button to say property reserved
                    $buttonMessage = 'Property Reserved!';
                }
                else
                {
                    $Message = 'You must be a travel nurse to reserve a property!';
                }

                // print message to user
                if (isset($Message))
                {
                    echo "<script>alert('$Message')</script>"; 
                }
        
            }
            ?>
            <form method="post">
            <input type="submit" name="reserve" class="reserve-btn" id = "reserve" value="<?=$buttonMessage?>">             
            </form>
           </div>
            </div>
    </div>
   
    <!------ footer ----->
    <?php include("footer.php"); ?>
</body>
</html>

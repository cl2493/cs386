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

$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT * FROM listingsdb WHERE user_id = :user_id");
$query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

$listings = getListings($conn, $query);
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
    <div class="header">           
        <!-- Navigation bar -->
        <nav id="navBar">
            <!-- Logo -->
            <!-- Navigation links -->
            <a href = "index.php"><img src="images/logo.png" class="logo"></a>
            <ul class="nav-links">
                <li><a href="404ErrorPage.html">Locations</a></li>
                <li><a href="404ErrorPage.html">Benefits</a></li>
                <li><a href="404ErrorPage.html">Accommodation</a></li>
            </ul>
            <!-- Profile button -->
            <a class="profile-btn" onclick="popupFunction()">Profile</a>
        </nav>
    </div>
<!------------------------------------Profile Page------------------------------------>
    <div class="profile-container">
        <div class = "profile-content">
            <!-- Profile header -->
            <div class="profile-header">
                <!-- Profile picture -->
                <h1 id="profile-Title">User Profile</h1>
                <!-- Profile name -->
                <div id="profile-picture"></div>
                <!-- Profile name -->
                <?php
                // Display the name of the user
                echo "<h2 class='name-info'><strong>$user->first_name $user->last_name";
                // Display the verified icon if the user is verified
                if ($verifiedFlag) {
                echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                }
                // Close the strong tag
                echo "</strong></h2>";
                ?>
            </div>

            <div class="pfnav-and-pfinfo">
            <!-- Profile data -->
           <div class="profile-data">
               <!-- Move the form and profile picture div here -->
               <!--on the left will have tabs for payment to update the screen -->
               <div class = "profile-nav">
               <div class="profile-tabs">
                   <li ><a href="propertyOwner-profile.php" class="active">Profile</a></li>
                   <!-- These links will be updated to the correct pages -->
                   <li><a href="">Payment</a></li>
                   <li><a href = "" >History</a></li>
                   <li><a href="">Settings</a></li>
                   <li><a href="profileListing.php">Listings</a></li>
              </div>
            </div>
            </div>

        
           


            <!-- Profile information -->
            <div class="profile-info">
            <?php
                   echo "<div class='space-top'></div>";
                   echo "<p><strong>User ID: </strong>$user->user_id</p>";
                   echo "<div class='space-top'></div>";
                   echo "<p><strong>Email: </strong>$user->email</p>";
                   echo "<div class='space-top'></div>";
                   echo "<p><strong>Birthday: </strong>$user->birthday</p>";
            ?>
            </div>
           </div>
            </div>
            <?php if (!$listings)
            {
                ?>
            <div class="listingText">
                <h1 id=>You have no listings</h1>
            </div>
            <?php
            }
            ?>
            </div>
            <div class="images">
    <?php
            for ($listing = 0; $listing < count($listings); $listing++)
            {
                ?>
                <div class ="property-square">
                <img src="<?=$listings[$listing]->images[0]->image?>" class="property-image">
                <div class="property-info">
                       <h2 class='property-name'><strong><?=$listings[$listing]->address?></strong></h2>
                       <h3 class='property-bed'>Beds: <?=$listings[$listing]->bed?></h3>
                       <h3 class='property-bath'>Baths: <?=$listings[$listing]->bath?></h3>
                       <h3 class='property-rent'><?=$listings[$listing]->price?></h3>
                    <a class="property-btn" href = "#">View Property</a>
                </div>
            </div>
                <?php
            }
            ?>
    </div>
    <!------ footer ----->
    <div class = "footer">
        <p>Follow Us On Social Media</p>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-facebook"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-google-plus"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-instagram"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-yelp"></i></a>
        <a href = "404ErrorPage.html">Help Center</a>
        <a href = "404ErrorPage.html">About Us</a>
        <p>Copyright © 2024, RNT-A-ROOM</p>
    </div>
</body>
</html>

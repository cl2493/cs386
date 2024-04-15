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
if (!isset($_SESSION['query']))
{
    $query = $conn->prepare("SELECT * FROM listingsdb WHERE availability = 'available'");
}
// $listings is an array of Listing objects (look at Listing class to see more)
$listings = getListings($conn, $query);
$listing = $_GET['Listing'];
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
<!------------------------------------Listing Page------------------------------------>
    <div class="profile-container">
        <div class = "profile-content">
            <!-- Profile header -->
            <div class="profile-header">
                <!-- Profile picture -->

                <!-- Profile name -->
                <div id="listing-picture"></div>
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

            <!-- listing information -->
            <div class="listing-info">
                <img src="<?=$listings[$listing]->images[0]->image?>" class="property-image">
                <h6 id=""><?=$listings[$listing]->address?></h6>

            <p><strong>Bedrooms: <?=$listings[$listing]->bed?></strong></p>
            <p><strong>Bathrooms: <?=$listings[$listing]->bath?></strong></p>
            <p><strong>Monthly Cost: $<?=$listings[$listing]->price?></strong></p>

<p>Rating: <span class="star-rating">
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
	</span></p>
            </div>
            
           </div>
            </div>

 

    </div>
   
    <!------ footer ----->
    <?php include("footer.php"); ?>
</body>
</html>

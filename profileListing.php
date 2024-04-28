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

// gets listings that current user owns
$listings = $user->pfListings;
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

           <div class="listing" id="listing">
                <form class="listing-forum" action="listingInterface.php" method="POST" id="listing-forum" enctype='multipart/form-data'>
                <h2 class ="listingForumTitle">Listing Information</h2>
                <div>
                    <label>Street address</label>
                    <input type="text" id="street-address" name="street-address" autocomplete="street-address" required enterkeyhint="next"></input>
                </div>
                <div>
                    <label>ZIP or postal code (optional)</label>
                    <input class="postal-code" id="postal-code" name="postal-code" autocomplete="postal-code" enterkeyhint="next">
                </div>
                <div>
                    <label>City</label>
                    <input required type="text" id="city" name="city" autocomplete="address-level2" enterkeyhint="next">
                </div>
                <div>
                    <label>Monthly Cost</label>
                    <input required type="number" id="price" name="price" autocomplete="cost" enterkeyhint="">
                </div>
                <div>
                    <label>Number of Bedrooms</label>
                    <input required type="number" id="bed" name="bed" autocomplete="cost" enterkeyhint="">
                </div>
                <div>
                    <label>Number of Bathrooms</label>
                    <input required type="number" id="bath" name="bath" autocomplete="cost" enterkeyhint="">
                </div>
                <div class="content-select">
                        <label>Lease Start</label>
                        <input type="date" id="lease_length" placeholder="Select lease length">
                        <label>Lease End</label>
                        <input type="date" id="lease_length" placeholder="Select lease length">
                    </div>
                <div>
                    <label>Images</label>
                    <input required type="file" id="imgs" name="file" multiple>
                </div>
                <div>
                    <button type="submit" name="submitBtn">Submit</button>
                </div>
                </form>
            </div>
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
                       <a class="property-btn" href = "ListedPropertyTemp.php?Listing=<?=$listings[$listing]->address?>">View Property</a>
                </div>
            </div>
                <?php
            }
            ?>
    </div>
    <!------ footer ----->
    <?php include("footer.php"); ?>

</body>
</html>

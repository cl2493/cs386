<?php
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_SESSION['pfType']))
{
    $user = checkLogin($conn,$_SESSION['pfType']);
}

$property_data = ["1", "Fake Property Name", "2", "1.5", "$1000"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>RNT-A-ROOM Home Listings</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/listingStyle.css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js"></script>
</head>
<body>
<!-- Body of the page -->
   <div class = "header">
       <nav id = "blank-navbar">
              <a href = "index.php"><img src="images/logo.png" class="logo"></a>
              <ul class="nav-links">
                <li><a href="404ErrorPage.html">Locations</a></li>
                <li><a href="404ErrorPage.html">Benefits</a></li>
                <li><a href="404ErrorPage.html">Accommodation</a></li>
              </ul>
              <?php
                    if (isset($_SESSION['user_id']))
                    {
                        if ($_SESSION['pfType'] == 'travelnursesdb')
                        {
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="nurse-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        else
                        {
                            echo '</a>';
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="propertyOwner-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    else
                    {
                        echo '<a class="login-btn" onclick="popupFunction()">Sign In</a>';
                    }
                ?>
        </nav>
   </div>
   <div class = "listing-container">
    <div class = "listing-content">
        <div class = "property-display">
            <div class ="property-square">
                <img src="images/propertyImage/fake-property.jpg" class="property-image">
                <div class="property-info">
                    <?php
                       echo "<h2 class='property-name'><strong>$property_data[1]</strong></h2>";
                       echo "<h3 class='property-bed'>Beds: $property_data[2]</h3>";
                       echo "<h3 class='property-bath'>Baths: $property_data[3]</h3>";
                       echo "<h3 class='property-rent'>$property_data[4]</h3>";
                    ?>
                    <a class="property-btn" href = "#">View Property</a>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</html>

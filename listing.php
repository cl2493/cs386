<?php
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_SESSION['pfType']))
{
    $user = checkLogin($conn,$_SESSION['pfType']);
}

if (!isset($_SESSION['query']))
{
    $query = $conn->prepare("SELECT * FROM listingsdb");
}
// $listings is an array of Listing objects (look at Listing class to see more)
$listings = getListings($conn, $query);


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

$rating = 3;
$index;
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
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon($newMessageFlag);
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
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon($newMessageFlag);
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
            <?php
            for ($listing = 0; $listing < count($listings); $listing++)
            {
                ?>
                <div class ="property-square">
                    <!--- Replaced the images with fake property ---->
                     <img src="images/propertyImage/fake-property.jpg" class="property-image">
                     <!--- Displays the star ratings (please round up if it's a fraction)---->
                     <?php
                          displayStar ($rating)
                     ?>
                     <div class="property-info">
                          <!--- Location is a placeholder, please replace with the actual location of the property ---->
                          <h3 class='property-location'>Location: Phoenix, AZ</h3>
                          <h2 class='property-name'><strong><?=$listings[$listing]->address?></strong></h2>
                          <h3 class='property-bed'>Beds: <?=$listings[$listing]->bed?></h3>
                          <h3 class='property-bath'>Baths: <?=$listings[$listing]->bath?></h3>
                          <h3 class='property-rent'>Rent: $<?=$listings[$listing]->price?></h3>
                       <a class="property-btn" href = "#">View Property</a>
                     </div>
                 </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>

<?php include("footer.php"); ?>

</body>
</html>

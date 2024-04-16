<?php
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_SESSION['pfType']))
{
    $user = checkLogin($conn,$_SESSION['pfType']);
}

// set default filtering options
$location ='';
$bed = "Beds";

if (!isset($_SESSION['query']))
{
    // default query
    $query = "SELECT * FROM listingsdb WHERE availability = 'available' AND price>=:minPrice AND price<=:maxPrice";

    // default price range is all prices
    $data = [
        ":minPrice" => 0,
        ":maxPrice" => 10000,
    ];
}
else
{
    // filter query
    $query = $_SESSION['query'];
    $data = $_SESSION['data'];

    // show current filterng options
    if (isset($data[':location']))
    {
        $location = $data[':location'];
    }
    if (isset($data[':bed']))
    {
        $bed = $data[':bed'];
    }
    // TODO: OTHER FILTERING OPTIONS
}

// $listings is an array of Listing objects (look at Listing class to see more)
$listings = getListings($conn, $query, $data);

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
        <?php include("directorySearch.php"); ?>
        <div class = "property-display">
            <?php
            for ($listing = 0; $listing < count($listings); $listing++)
            {
                ?>
                <div class ="property-square">
                    <!--- Replaced the images with fake property ---->
                     <img src="<?=$listings[$listing]->images[0]->image?>" class="property-image">
                     <!--- Displays the star ratings (please round up if it's a fraction)---->
                     <?php
                          displayStar ($rating)
                     ?>
                     <div class="property-info">
                          <h3 class='property-location'>Location: <?=$listings[$listing]->city?></h3>
                          <h2 class='property-name'><strong><?=$listings[$listing]->address?></strong></h2>
                          <h3 class='property-bed'>Beds: <?=$listings[$listing]->bed?></h3>
                          <h3 class='property-bath'>Baths: <?=$listings[$listing]->bath?></h3>
                          <h3 class='property-rent'>Rent: $<?=$listings[$listing]->price?></h3>
                          <?php
                          if (isset($user))
                          {
                            ?>
                            <a class="property-btn" href = "ListedPropertyTemp.php?Listing=<?=$listing?>">View Property</a>
                            <?php
                          }
                          else
                          {
                            ?>
                            <a class="property-btn" onclick="showMessageFunction()">View Property</a>
                            <?php  
                          }
                          ?>
                     </div>
                 </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>

<?php include("footer.php"); ?>
<script src="script.js"></script>
</body>
</html>

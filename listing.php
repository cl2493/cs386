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
$baths = "Baths";
$minPrice = 0;
$maxPrice = 10000;

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
    if (isset($data[':bath']))
    {
        $baths = $data[':bath'];
    }
    if (isset($data[':minPrice']))
    {
        $minPrice = $data[':minPrice'];
    }
    if (isset($data[':maxPrice']))
    {
        $maxPrice = $data[':maxPrice'];
    }
    // TODO: LEASE LENGTH
}

// $listings is an array of Listing objects (look at Listing class to see more)
//$listings = getListings($conn, $query, $data);

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
   <?php include('header.php');?>
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
    <link rel="stylesheet" type="text/css" href="style/footer/footer.css">
<?php include("footer.php"); ?>
<script src="script.js"></script>
</body>
</html>

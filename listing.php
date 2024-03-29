<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>RNT-A-ROOM Home Listings</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle.css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer></script>
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
              <button class="profile-btn" onclick="popupFunction()">Profile</a>
        </nav>
   </div>
   <div class = "listing-container">
    <div class = "listing-content">
        <div class="listing-header">
            <h1 id="listing-Title">Home Listings</h1>
            <div id="listing-picture"></div>
        </div>
        <div class="listing-body">
            <div class="listing-details">
                <h2>Listing Details</h2>
                <p>Details of the listing</p>
            </div>
            <div class="listing-features">
                <h2>Listing Features</h2>
                <p>Features of the listing</p>
            </div>
            <div class="listing-amenities">
                <h2>Listing Amenities</h2>
                <p>Amenities of the listing</p>
            </div>
            <div class="listing-location">
                <h2>Listing Location</h2>
                <p>Location of the listing</p>
            </div>
            <div class="listing-contact">
                <h2>Contact Information</h2>
                <p>Contact information of the listing</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// This is a placeholder for the nurse profile page
// The data will be retrieved from the database
// For now, the data is hardcoded
// The data will be displayed in the profile page
// The profile page will have a form to upload a profile picture
// profile picture currently does not display
$first_name = "John";
$middle_name = "Doe";
$last_name = "Smith";

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Payment</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="../style/generalStyle.css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Top of the page -->
    <div class="header">           
        <!-- Navigation bar -->
        <nav id="navBar">
            <!-- Logo -->
            <!-- Navigation links -->
            <a href = "index.php"><img src="../images/logo.png" class="logo"></a>
            <ul class="nav-links">
                <li><a href="404ErrorPage.html">Locations</a></li>
                <li><a href="404ErrorPage.html">Benefits</a></li>
                <li><a href="404ErrorPage.html">Accommodation</a></li>
            </ul>
            <!-- Profile button -->
            <a class="profile-btn" onclick="popupFunction()"><?php echo "$first_name $last_name"; ?></a>
        </nav>
    </div>
<!------------------------------------Payment Page------------------------------------>
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
                echo "<h2 class='name-info'><strong>$first_name $middle_name $last_name";
                // Display the verified icon if the user is verified
                if ($verifiedFlag) {
                    echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                }
                // Close the strong tag
                echo "</strong></h2>";
                ?>
            </div>
            <div class="profile-data">
                <!-- Move the form and profile picture div here -->
                <!--on the left will have tabs for payment to update the screen -->
                <div class = "profile-nav">
                    <div class="profile-tabs">
                        <li ><a href="nurse-profile.php" class="active">Profile</a></li>
                        <!-- These links will be updated to the correct pages -->
                        <li><a href="nurse-profile-tabs/payment-setting.php">Payment</a></li>
                        <li><a href = "" >History</a></li>
                        <li><a href="">Settings</a></li>
                    </div>
                </div>
            </div>

        </div>
</div>
</body>
</html>

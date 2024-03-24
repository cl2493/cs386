<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Settings</title>
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
<!------------------------------------Settings Page------------------------------------>
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
            <div class="profile-form">
                <form action="updateProfile.php" method="post">
                    <div class="profile-form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" value="<?php echo $middle_name; ?>">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                        <label for="phone_number">Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                        <button type="submit" class="profile-btn">Update</button>
                        <button type="reset" class="profile-btn">Reset</button>
                        <button type="button" class="profile-btn" onclick="window.location.href='nurse-profile.php'">Cancel</button>
                        <button type="button" class="profile-btn" onclick="window.location.href='logout.php'">Logout</button>
                        <button type="button" class="profile-btn" onclick="window.location.href='deleteProfile.php'">Delete</button>
                    </div>
            </div>

        </div>
</div>
</body>
</html>

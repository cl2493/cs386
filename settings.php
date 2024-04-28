<!-- Nurse profile header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Nurse Setttings
    </title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle.css">
    <style>
    #setting-tab{
        background-color: #e7b93b;
        color: #fff;
    }
        </style>
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer>

    </script>
</head>
<!-- Body of the page -->
<body>
    <!-- Top of the page -->
    <?php include('header.php'); ?>

    <!----- FORM ---->
    <div class="profile-container">
        <div class = "profile-content">
            <!-- Profile header -->
            <div class="profile-header">
                <!-- Profile picture -->
                <h1 id="profile-Title">User Profile</h1>
                <!-- Profile name -->
                <div class="profile-picture">
                    <?php
                    $profile_picture_path = "get-pfp.php";
                    echo "<img src='$profile_picture_path' alt='Profile Picture'>";
                    ?>
                </div>
                <?php
                echo "<h2 class='name-info'><strong>$user->first_name $user->last_name";
                // Display the verified icon if the user is verified
                if ($verifiedFlag) 
                {
                    echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                }
                // Close the strong tag
                echo "</strong></h2>";
                ?>
            </div>
            <!-- Profile data -->
           <div class="profile-data">
               <!-- Move the form and profile picture div here -->
               <!--on the left will have tabs for payment to update the screen -->
               <div class = "profile-nav">
               <div class="profile-tabs">
                   <li ><a href="nurse-profile.php" class="active">Profile</a></li>
                   <!-- These links will be updated to the correct pages -->
                   <li><a href="">Payment</a></li>
                   <li><a href = "" >History</a></li>
                   <li><a id="setting-tab" href="settings.php">Settings</a></li>
               </div>
            </div>
            
            <!-- Profile information -->
            <div class="profile-info">
                <form>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" value="<?php echo $user->first_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" value="<?php echo $user->last_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $user->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" name="birthday" value="<?php echo $user->birthday; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Phone Number</label>
                        <input type="phone-number" id="phone-number" name="phone-number" value="<?php echo $user->phone_number; ?>">
                    </div>
                    <button class="sub-btn" type="submit">Save Changes</button>
                    <button class="sub-btn" type="submit">Cancel</button>
                </form>
            </div>
            <div id = "certification"> 
                        <form id="certForm" action="upload_certification.php" method="post" enctype="multipart/form-data">
                            <div class="cert-upload">
                                <h2>Upload Profile Photo</h2>
                            </div>
                            <label for="certFile" class="select-btn">Select Photo</label>
                            <input type="file" id="certFile" name="certFile" accept="image/*" class="file-input">
                            <button type="submit" class="upload-btn">Upload</button>
                            <span id='fileNameDisplay' class='file-name-display'>$inputFileName</span>
                        </form>
                </div>
           </div>
       </div>
    </div>
</body>
</html>


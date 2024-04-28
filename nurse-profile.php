<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
include("connection.php");
include("phpfunctions.php");

$inputFileName = '';

// check if user is logged in
if(isset($_SESSION['pfType']))
{
    $user = checkLogin($conn, $_SESSION['pfType']);
    $submission_stage = $user->stage;

    $verifiedFlag = false;

    // check if user is verified
    if ($submission_stage == 'Approved')
    {
        $verifiedFlag = true;
    }
}

// user is not logged in, redirect to homepage
else
{
    header("Location: index.php");
    exit();
}

?>

<!-- Nurse profile header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Nurse Profile</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle.css">
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
                <div class="profile-picture">
                    <?php
                    $profile_picture_path = "get-pfp.php";
                    echo "<img src='$profile_picture_path' alt='Profile Picture'>";
                    ?>
                </div>
                <!-- Button for uploading profile picture -->
                <!-- feel free to fix cathy -->
                
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
                   <li><a href="">Settings</a></li>
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
            <div id = "certification">
            <?php
            // check submission stage
                if ($submission_stage)
                {
                    //$submission_stage = $_SESSION['submission_stage'];
                    if ($submission_stage == "Not Submitted" || $submission_stage == "Rejected") 
                    {
                       
                        echo '<form id="certForm" action="upload_certification.php" method="post" enctype="multipart/form-data">';
                        echo '<div class="cert-upload">';
                        echo '<h2>Upload Certification</h2>';
                        echo '</div>';
                        echo '<label for="certFile" class="select-btn">Select PDF File</label>';
                        echo '<input type="file" id="certFile" name="certFile" accept=".pdf" class="file-input">';
                        echo '<button type="submit" class="upload-btn">Upload</button>';
                        echo "<span id='fileNameDisplay' class='file-name-display'>$inputFileName</span>";
                        echo '</form>';
                    } 
                    else if ($submission_stage == "Submitted") 
                    {
                        echo '<div class="cert-upload">';
                        echo '<h2>Certification Submitted</h2>';
                        echo '</div>';
                    } 
                    else if ($submission_stage == "Approved") 
                    {
                        echo '<div class="cert-upload">';
                        echo '<h2>Certification Approved</h2>';
                        echo '</div>';
                        echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                    }
                }
                ?>
                </div>
           </div>
       </div>
    </div>
    <!------ footer ----->
    <link rel="stylesheet" type="text/css" href="style/footer/footer.css">
    <?php include("footer.php"); ?>
</body>
</html>

<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

var_dump($_SESSION);



include("connection.php");

// initialize verified flag
$verifiedFlag = false;

// check if user is logged in
// get user info
if(isset($_SESSION['user_id']) && isset($_SESSION['pfType'])){
    $user_id = $_SESSION['user_id'];
    $pfType = $_SESSION['pfType'];

    // query to get user info from the database
    $query = "SELECT first_name, last_name, email, birthday, submission_stage FROM $pfType WHERE user_id=?";
    $stmt = $conn->prepare($query);

    // bind parameters
    $stmt->bindValue(1,$user_id, PDO::PARAM_INT);

    // execute statement
    $stmt->execute();

    // get result
    $result = $stmt->get_result();

    // check if query was successful and get user data
    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $birthday = $row['birthday'];
        $submission_stage = $row['submission_stage'];


        // check if the submission stage shows user is verified
        if($submission_stage == "Approved")
        {
            $verifiedFlag = true;
        }
    }

    else{
        // handles error if couldn't get user data
        echo "Error: Failed to get user information.";
        exit();
    }
}
    else{
        // case if user isn't logged in
        header("Location: index.php");
        exit();
    }


// placeholder for uploaded file?
$inputFileName = "No File Selected";
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
    <div class="header">           
        <!-- Navigation bar -->
        <nav id="navBar">
            <!-- Logo -->
            <!-- Navigation links -->
            <a href = "index.php"><img src="images/logo.png" class="logo"></a>
            <ul class="nav-links">
                <li><a href="404ErrorPage.html">Locations</a></li>
                <li><a href="404ErrorPage.html">Benefits</a></li>
                <li><a href="404ErrorPage.html">Accommodation</a></li>
            </ul>
            <!-- Profile button -->
            <div class="profile-dropdown">
                <button class="profile-btn" data-dropdown-button><?php echo "$first_name $last_name"; ?></button>
                <div class="menu-dropdown" data-dropdown tabindex="0">
                    <div class="menu-dropdown-content">
                        <a href="nurse-profile.php">Profile</a>
                        <a href="../nurse-profile-tabs/payment-setting.php">Payment</a>
                        <a href="404ErrorPage.html">History</a>
                        <a href="404ErrorPage.html">Settings</a>
                        <a href="404ErrorPage.html">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
<!------------------------------------Profile Page------------------------------------>
    <div class="profile-container">
        <div class = "profile-content">
            <!-- Profile header -->
            <div class="profile-header">
                <!-- Profile picture -->
                <h1 id="profile-Title">User Profile</h1>
                <!-- Profile name -->
                <div id="profile-picture"></div>
                <h2 class='name-info'><strong><?php echo "$first_name $last_name";?></strong></h2>
                <?php
                // Display the verified icon if the user is verified
                if ($verifiedFlag) {
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
                <div class='space-top'></div>
                <p><strong>User ID:</strong> <?php echo $user_id; ?></p>
                <div class='space-top'></div>
                <p><strong>Certification Submission:</strong> <?php echo $submission_stage; ?></p>
                <div class='space-top'></div>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <div class='space-top'></div>
                <p><strong>Birthday:</strong> <?php echo date("F j, Y", strtotime($birthday)); ?></p>
            </div>
            <div id = "certification">
            <?php
            if ($submission_stage == "Not Submitted" || $submission_stage == "Rejected") {
                echo '<form id="certForm" action="upload_certification.php" method="post" enctype="multipart/form-data">';
                echo '<div class="cert-upload">';
                echo '<h2>Upload Certification</h2>';
                echo '</div>';
                echo '<label for="certFile" class="select-btn">Select PDF File</label>';
                echo '<input type="file" id="certFile" name="certFile" accept=".pdf" class="file-input">';
                echo '<button type="submit" class="upload-btn">Upload</button>';
                echo "<span id='fileNameDisplay' class='file-name-display'>$inputFileName</span>";
                echo '</form>';
            } else if ($submission_stage == "Submitted") {
                echo '<div class="cert-upload">';
                echo '<h2>Certification Submitted</h2>';
                echo '</div>';
            } else if ($submission_stage == "Approved") {
                $verifiedFlag = true;
                echo '<div class="cert-upload">';
                echo '<h2>Certification Approved</h2>';
                echo '</div>';
            }
?>

            </div>
           </div>
       </div>

    </div>
    <!------ footer ----->
    <div class = "footer">
        <p>Follow Us On Social Media</p>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-facebook"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-google-plus"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-instagram"></i></a>
        <a href = "404ErrorPage.html"><i class="fa-brands fa-yelp"></i></a>
        <a href = "404ErrorPage.html">Help Center</a>
        <a href = "404ErrorPage.html">About Us</a>
        <p>Copyright © 2024, RNT-A-ROOM</p>
    </div>
</body>
</html>

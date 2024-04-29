<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php");
include("phpfunctions.php");

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

// check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // check if save changes button is clicked
    if (isset($_POST["saveChanges"]))
    {
        // Get the form data and sanitize/validate it (not implemented here)
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $phoneNumber = $_POST["phone-number"]; 

        // update user's information
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->birthday = $birthday;

        // update the phone number in the 'user_phone_numbers' table with FK: user id
        $query = "UPDATE user_phone_numbers SET phone_number = :phoneNumber WHERE user_id = :userId";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(':phoneNumber' => $phoneNumber, ':userId' => $user->user_id));

        // profile picture upload
        if (isset($_FILES["profilePictureFile"]) && $_FILES["profilePictureFile"]["error"] == 0) 
        {
            // File path and where to put it
            $targetDir = "upload/";
            $fileName = basename($_FILES["profilePictureFile"]["name"]);
            $targetFilePath = $targetDir . $fileName;

            // Move the file into path
            if (move_uploaded_file($_FILES["profilePictureFile"]["tmp_name"], $targetFilePath)) 
            {
                // Insert file path into the profile_pictures table
                $query = "INSERT INTO profile_pictures (user_id, file_path) VALUES (:userId, :filePath)";
                $stmt = $conn->prepare($query);
                $stmt->execute(array(':userId' => $user->user_id, ':filePath' => $targetFilePath));

                // Redirect to the profile page with success message
                header("Location: nurse-profile.php?success=1");
                exit();
            } 
            else 
            {
                // Error handling: Profile picture upload failed
                echo "Sorry, there was an error uploading your profile picture.";
            }
        }

        // Redirect to the profile page after saving changes
        header("Location: nurse-profile.php");
        exit();
    }
}
?>
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                        <input type="text" id="phone-number" name="phone-number" value="<?php echo $user->phone_number; ?>">
                    </div>
                    <button class="sub-btn" type="submit">Save Changes</button>
                    <button class="sub-btn" type="button" onclick="cancelChanges()">Cancel</button>
                </form>
            </div>
            <div id = "certification"> 
                        <form id="pfpForm" action="upload-pfp.php" method="post" enctype="multipart/form-data">
                            <div class="pfp-upload">
                                <h2>Upload Profile Photo</h2>
                            </div>
                            <label for="profilePictureFile" class="select-btn">Select Photo</label>
                            <input type="file" id="profilePictureFile" name="profilePictureFile" accept="image/*" class="file-input">
                            <button type="submit" class="upload-btn">Upload</button>
                            <span id='fileNameDisplay' class='file-name-display'>$inputFileName</span>
                        </form>
                </div>
           </div>
       </div>
    </div>
</body>
</html>


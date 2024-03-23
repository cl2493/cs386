<?php
// This is a placeholder for the nurse profile page
// The data will be retrieved from the database
// For now, the data is hardcoded
// The data will be displayed in the profile page
// The profile page will have a form to upload a profile picture
// profile picture currently does not display
$first_name = "John";
$middle_name = "";
$last_name = "Smith";
$userID = 12341;
$email = "john@example.com";
$phone = "123-456-7890";
$b_month = "October";
$b_day = 1;
$b_year = 1990;
$verifiedFlag = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Profile</title>
    <link rel="stylesheet" href="style/generalStyle.css">
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="header">           
        <nav id="navBar">
            <img src="images/logo.png" class="logo">
            <ul class="nav-links">
                <li><a href="404ErrorPage.html">Locations</a></li>
                <li><a href="404ErrorPage.html">Benefits</a></li>
                <li><a href="404ErrorPage.html">Accommodation</a></li>
            </ul>
            <a class="login-btn" onclick="popupFunction()">Sign In</a>
        </nav>
        <div class="myPopup" id="myPopup">
            <button class="exit-btn" onclick="closePopup()">X</button>
            <form class="myPopup-Form">
                <h2 class="tenants-login">Sign In</h2>
                <label>Email</label><br>
                <input type="text"><br>
                <label>Password</label><br>
                <input type="text"><br>
            </form>
            <a href="404ErrorPage.html" class="sign-in-btn">Login</a>
            <a href="nurse-register.html" class="sign-in-btn" id="nurse-register">Register</a>
        </div>
    </div>
<!------------------------------------Profile Page------------------------------------>
    <div class="profile-container">
        <div class = "profile-content">

           <div class="profile-header">
              <h1 id="profile-Title">User Profile</h1>
              <div id="profile-picture"></div>
                  <?php
                      echo "<h2 class='name-info'><strong>$first_name $middle_name $last_name";
                      if ($verifiedFlag) {
                          echo "<img src='images/icons/check-symbol.png' class='verified-icon'>";
                      }
                      echo "</strong></h2>";
                   ?>
           </div>
           <div class="profile-data">
               <!-- Move the form and profile picture div here -->
               <!--on the left will have tabs for payment to update the screen -->
               <div class = "profile-nav">
               <div class="profile-tabs">
                   <li ><a href="nurse-profile.php" class="active">Profile</a></li>
                   <li><a href="nurse-availability.php">Payment</a></li>
                   <li><a href = "" >History</a></li>
                   <li><a href="">Settings</a></li>
               </div>
            </div>

            <div class="profile-info">
                <div class='space-top'></div>
                <p><strong>User ID:</strong> <?php echo $userID; ?></p>
                <div class='space-top'></div>
                <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                <div class='space-top'></div>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <div class='space-top'></div>
                <p><strong>Birthday:</strong> <?php echo "$b_month $b_day, $b_year"; ?></p>
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

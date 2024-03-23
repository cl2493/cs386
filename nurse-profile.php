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

    <div class="profile-container">
        <h1 id = "profile-Title">User Profile</h1>
        <div class="profile-data">
            <!-- Move the form and profile picture div here -->
            <div id="profile-picture"></div>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" id="image_input" accept="image/png, image/jpg">
            </form>
            <div class="profile-info">
                <!-- Move the PHP code here -->
                <?php
                // Sample user data (replace this with data from database)
                $first_name = "John ";
                $middle_name = "";
                $last_name = "Smith";
          
                $userID = 12341;

                $email = "john@example.com";

                $phone = "123-456-7890";

                $b_month = "October";
                $b_day = 1;
                $b_year = 1990;

                $verifiedFlag = false;


                // Display user information

                echo "<div class='profile-info'>";
                                
                if ($verifiedFlag) {
                    echo "<div class='name-info'>
                    <h2>
                    <strong>$first_name $middle_name $last_name</strong><img src='images/icons/check-symbol.png' class='verified-icon'>
                    </h2>
                    </div>";
                }
                else
                {       
                echo "<div class='name-info'>
                <h2>
                <strong>$first_name $middle_name $last_name</strong>
                </h2>
                </div>";                
                }

                // Add spacing using CSS class
                echo "<div class='space-top'></div>"; 
                echo "<p><strong>User ID:</strong> $userID</p>";

                // Add spacing using CSS class
                echo "<div class='space-top'></div>"; 
                echo "<p><strong>Phone:</strong> $phone</p>";

                // Add spacing using CSS class
                echo "<div class='space-top'></div>"; 
                echo "<p><strong>Email:</strong> $email</p>";

                // Add spacing using CSS class
                echo "<div class='space-top'></div>"; 
                echo "<p><strong>Birthday:</strong> $b_month $b_day, $b_year</p>";
                ?>
            </div>
        </div>
    </div>
</body>
</html>

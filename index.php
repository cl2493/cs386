<!----- INDEX.PHP  ----->
<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_SESSION['pfType']))
{
    $user = checkLogin($conn,$_SESSION['pfType']);
}

// check for registration success
if(isset($_SESSION['registration_success']) && $_SESSION['registration_success']){
        echo '<div id="welcomePopup" class="welcome-popup">Welcome! You have successfully registered.</div>';

        // unset session variable to stop the message on following visits
        unset($_SESSION['registration_success']);
    }


?>

<!----- HOMEPAGE  ----->
<! DOCTYPE html>
<!----- Basic Starting Set Up ----->
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RNT-A-ROOM</title>
    <!----- Connects to Different Files ----->
    <!-----
    This connects to homepageStyle.css
    which will make the website look pretty
    ----->
    <link rel="stylesheet" href = "style/homepageStyle.css">
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
  </head>
    <!----- Start of the Enter Webpage ----->
  <body>
        <?php
                    if(isset($_GET['Message'])){
                        echo '<script type="text/javascript">
                        window.onload = function () 
                        {
                            alert("The email or password you have entered is incorrect.");
                        } 
                        </script>';
                        unset($_GET['Message']);
                    }
        ?>
        <div class = "header">           
            <nav id = "navBar">
                <img  src="images/logo.png" class = "logo" >
                <ul class = "nav-links">
                    <li><a href = "listing.php">Locations</a></li>
                    <li><a href = "404ErrorPage.html">Benefits</a></li>
                    <li><a href = "404ErrorPage.html">Accommodation</a></li>
                </ul>
                <?php
                    if (isset($_SESSION['user_id']))
                    {
                        if ($_SESSION['pfType'] == 'travelnursesdb')
                        {
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon($newMessageFlag);
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="nurse-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        else
                        {
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon($newMessageFlag);
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="propertyOwner-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    else
                    {
                        echo '<a class="login-btn" onclick="popupFunction()">Sign In</a>';
                    }
                ?>
            </nav>
            <div class ="myPopup" id="myPopup">
                <button class="exit-btn" onclick="closePopup()">X</button>
                <form action="signin.php" method="POST" class="myPopup-Form">
                    <h2 class="tenants-login">Sign In</h2>
                    <label>Email</label><br>
                    <input name="signinemail" type="text"><br>
                    <label>Password</label><br>
                    <input name="signinpassword" type="password"><br>
                    <button name="sign-in-btn" type= "submit" class="sign-in-btn">Login</button>
                </form>
                <a href="nurse-register.php" class="sign-in-btn" id = "nurse-register">Register</a>
            </div>
            <div class="container">
				<div class="left">
                    <h1>A Place That<br>Feels Like Home</h1>
                    <div class="search-bar">
                        <form>
                            <div class="search-input">
                                <label>Location</label>
                                <input type="text" placeholder="New York, Chicago...">
                            </div>
                            <div class="content-dropdown" data-dropdown>
                                <label># of Beds</label>
                                <button class="drop" data-dropdown-button>Beds</button>
                                <div class="dropdown-menu">
                                    <div class= "dropdown-menu-selection">
                                        <a href="#" class = "link">1</a>
                                        <a href="#" class = "link">2</a>
                                        <a href="#" class = "link">3</a>
                                        <a href="#" class = "link">4</a>
                                        <a href="#" class = "link">5</a>
                                    </div>
                                </div>
                            </div>
                            <div class="content-dropdown" data-dropdown>
                                <label>Lease Length</label>
                                <button class="drop" data-dropdown-button># of Weeks</button>
                                <div class="dropdown-menu">
                                    <div class= "dropdown-menu-selection">
                                        <a href="#" class = "link">1-3</a>
                                        <a href="#" class = "link">4-6</a>
                                        <a href="#" class = "link">7-9</a>
                                        <a href="#" class = "link">10-15</a>
                                        <a href="#" class = "link">15+</a>
                                    </div>
                                </div>                            
                            </div>
                            <button class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!----UNDERNEATH THE HEADER PHOTO---------->

        <div class = "container">
            <h2 class="sub-title">Where You Going To Next?</h2>
            <div class="content-type">
                <div>
                    <img src="images/homepageImages/locationsImages/flordia.jpg">
                    <span>
                        <h3>Miami, Flordia</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/hawaii.jpg">
                    <span>
                        <h3>Honolulu, Hawaii</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/texas.jpeg">
                    <span>
                        <h3>San Antonio, Texas</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/atlanta.jpg">
                    <span>
                        <h3>Atlanta, Georgia</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/washington.jpg">
                    <span>
                        <h3>Seattle, Washington</h3>
                    </span>
                </div>
            </div>
            <h2 class="sub-title">Types Of Living</h2>
            <div class="type-rentals">
                <div>
                    <img src = "images/homepageImages/rentalTypeImages/homes.jpg">
                    <h3>Rental Homes</h3>
                </div>
                <div>
                    <img src = "images/homepageImages/rentalTypeImages/hotel.jpg">
                    <h3>Extended Stays Hotels</h3>
                </div>
                <div>
                    <img src ="images/homepageImages/rentalTypeImages/apartments.jpg">
                    <h3>Apartments</h3>
                </div>
            </div>
            <div class="prop-owner-contact">
                <h3>Want to support<br>our Travel Nurses?</h3>
                <p>Look into how you can get your space posted on our website</p>
                <a href ="learn-more.html" class="learn-btn">Learn More</a>
            </div>

        </div>







    <!------ footer ----->

    <?php include("footer.php"); ?>

  </body>
</html>

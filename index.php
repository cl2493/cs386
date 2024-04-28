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
<!DOCTYPE html>
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
            include('header.php');
        ?>
        
            <div class="container">
				<div class="left">
                    <h1>A Place That<br>Feels Like Home</h1>
                    <div class="search-bar">
                        <form action="filter.php" method="POST">
                            <div class="search-input">
                                <label>Location</label>
                                <input name="location" type="text" placeholder="New York, Chicago...">
                            </div>
                            <div class="content-dropdown" data-dropdown>
                                <label># of Beds</label>
                                <select name="bed" id="" class="drop">
                                    <option value=""><?=$baths?></option>
                                    <option value="">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="content-dropdown" data-dropdown>
                                <label># of Baths</label>
                                <select name="bed" id="" class="drop">
                                    <option value=""><?=$baths?></option>
                                    <option value="">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button name="searchBtn" class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
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
                <a href ="settings.php" class="learn-btn">Learn More</a>
            </div>

        </div>







    <!------ footer ----->
    <link rel="stylesheet" type="text/css" href="style/footer/footer.css">
    <?php include("footer.php"); ?>

  </body>
</html>

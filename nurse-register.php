<?php

include('phpfunctions.php');
?>

<!-----USER REGISTER PAGE------->
<! DOCTYPE html>
<!----STARTING SETUP------->
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RNT-A-ROOM REGISTER</title>
        <!----connecting different files-->
        <link rel="stylesheet" href ="style/register-style.css">
        <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
        <script src="script.js" defer></script>
    </head>
    <!-------Start of Web Page---------->
    <body>
        <?php include('header.php'); ?>
        <div class="container">
            <form class="register-form" action="registration.php" method="POST" id="register-form">
                <?php
                if(isset($_GET['Message'])){
                    echo $_GET['Message'];
                }
                ?>
                <h2 class ="sign-up-title">Sign Up</h2>
                <div class="name-input">
                    <div class="first-name">
                        <input type="text" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="last-name">
                        <input type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                        <p>Ensure it matches your government ID.</p>
                </div>
                <div class="dob">
                    <h3>Birthday</h3>
                    <input type="date" name="birthday" required>
                    <p>To sign up you must but atleast 18.</p>
                </div>
                <fieldset>
                    <legend>Are you a Travel Nurse or Property Owner?</legend>
                    <div class="toggle">
                      <input type="radio" name="pfType" value="travelnursesdb" id="sizeWeight" checked="checked" />
                      <label for="sizeWeight">Travel Nurse</label>
                      <input type="radio" name="pfType" value="propertyownersdb" id="sizeDimensions" />
                      <label for="sizeDimensions">Property Owners</label>
                    </div>
                </fieldset>
                <div class="nurse-email">
                    <input type ="email" name="email" id = "nurse-email" placeholder="Email" required>
                </div>
                <div class = "password-input">
                    <input type ="password" name="password" id = "password" placeholder="Password">
                    <input type = "password" name="checkPassword" id = "check-password"  placeholder="Confirm Password" required>
                </div>
            <button name="submit-Btn" type= "submit" class="submit-btn">Submit</button>
            </form>
        </div>


    <!------ footer ----->
    <link rel="stylesheet" type="text/css" href="style/footer/footer.css">
    <?php include("footer.php"); ?>

    </body>
</html>

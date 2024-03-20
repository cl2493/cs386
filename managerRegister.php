<?php 
session_start();
include("connection.php");
if (isset($_POST['submit'])) {
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//save to database
			$query = "INSERT INTO propertyownersdb (email,password) VALUES ($email, $password)";
			$conn->exec($query);
		}else
		{
			echo "Please enter some valid information!";
		}
	}
	$conn = null;
?>
<!-----USER REGISTER PAGE------->
<! DOCTYPE html>
<!----STARTING SETUP------->
<html lang="en">
    <head>
        <meta name ="viewport">
        <title>Propertry Owner Portal</title>
        <!----connecting different files-->
        <link rel="stylesheet" href ="style/register-style.css">
        <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
        <script src="script.js" defer></script>
    </head>
    <!-------Start of Web Page---------->
    <body>
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

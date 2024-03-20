<?php 
session_start();
$dsn = 'mysql:host=bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=v3631j1wxf69fwg6';
$username = 'rz3g4npuxheqkm4q';
$password = 'w16mgna61998973p';

// Create connection
try
{
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
    echo "Connection failed: ". $e->getMessage();
}
echo "help"
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

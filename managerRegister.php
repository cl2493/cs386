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

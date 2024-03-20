<?php 
session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		if(!empty($email) && !empty($password))
		{

			//save to database
			$query = "INSERT INTO propertyownersdb (email,password) VALUES (:email, :password)";

			$stmt = $conn->prepare($query);
			$stmt->execute(['email' => $email, 'password' => $password]);
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
	$conn = null;
?>

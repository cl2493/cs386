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
			$query = "insert into propertyownersdb (email,password) values ('$email','$password')";

			$conn->exec($query);

			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
	$conn = null;
?>

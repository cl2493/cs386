<?php 
session_start();
include('connection.php');

if (isset($_POST['submitBtn'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];
        
        // save to database
		$query = "INSERT INTO propertyownersdb (email,password) VALUES (:email,:password)";
        $query_run = $conn->prepare($query);

        $data =[
            ':email' => $email,
            ':password' => $password,
        ];
        $query_execute = $query_run->execute($data);

        if($query_execute)
        {
            header('Location: index.php');
            exit(0);
        }
        else {
            header('Location: index.php');
            exit(0);
        }
	}
?>
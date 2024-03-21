
<?php
session_start();
include('connection.php');

// Check if the form was submitted
if (isset($_POST['submit-Btn'])) {
    // get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // insert data into the database
    $sql = $pdo->prepare("INSERT INTO travelnursesdb (first_name, last_name, birthday, email, password) VALUES (?, ?, ?, ?, ?)");

    // bind parameters
    $sql->bindParam(1, $first_name);
    $sql->bindParam(2, $last_name);
    $sql->bindParam(3, $birthday);
    $sql->bindParam(4, $email);
    $sql->bindParam(5, $password);
    
    if ($sql->execute()) 
    {
        echo "Data saved successfully!";
    } else 
    {
        echo "Error: " . $sql->errorInfo()[2];
    }

    $pdo = null; // Close the database connection
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

} else {
    // If the form was not submitted via POST method, redirect to the form page
    header("Location: nurse-register.php");
    exit; // Make sure to exit after redirection
}

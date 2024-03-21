
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
    $query = $pdo->prepare("INSERT INTO travelnursesdb (first_name, last_name, birthday, email, password) VALUES (:first_name, :last_name, :birthday, :email, :password)");
    $query_run = $conn->prepare($query);

    $data =[
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':birthday' => $birthday,
        ':email' => $email,
        ':password' => $password,
    ];
    $query_execute = $query_run->execute($data)

    if ($query_execute) 
    {
        echo "Data saved successfully!";
        header('Location: index.php');
        exit(0);
    } else 
    {
        echo "Error: " . $sql->errorInfo()[2];
    }

    $pdo = null; // Close the database connection
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

else {
    // If the form was not submitted via POST method, redirect to the form page
    header("Location: nurse-register.php");
    exit; // Make sure to exit after redirection
}

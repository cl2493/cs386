
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
    $query = "INSERT INTO travelnursesdb (first_name, last_name, birthday, email, password) VALUES (:first_name, :last_name, :birthday, :email, :password)";
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
        header('Location: index.php');
        exit(0);
    } else 
    {
        header('Location: index.php');
        exit(0);
    }
}
?>
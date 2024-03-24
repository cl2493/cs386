
<?php
session_start();
include('connection.php');
include('phpfunctions.php');

// Check if the form was submitted
if (isset($_POST['submit-Btn'])) {
    // get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $pfType = $_POST['pfType'];
    $user_id = randomNum(10,$pfType,$conn);
    $email = $_POST['email'];
    $password = $_POST['password'];

    // insert data into the database
    if ($pfType == "travelnurse")
    {
        $query = "INSERT INTO travelnursesdb (user_id, first_name, last_name, birthday, email, password) VALUES (:user_id, :first_name, :last_name, :birthday, :email, :password)";
    }
    else
    {
        $query = "INSERT INTO propertyownersdb (user_id, first_name, last_name, birthday, email, password) VALUES (:user_id, :first_name, :last_name, :birthday, :email, :password)";
    } 
        $query_run = $conn->prepare($query);

    $data =[
        ':user_id' => $user_id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':birthday' => $birthday,
        ':email' => $email,
        ':password' => $password,
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) 
    {
        // set session variables to show registration success and log-in status
        $_SESSION['registration_success'] = true;
        $_SESSION['username'] = $first_name;

        header('Location: index.php');
        exit(0);
    } else 
    {
        header('Location: index.php?registration=error');
        exit(0);
    }
}
?>
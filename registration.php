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
    $user_id = randomNum(5,$pfType,$conn);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];

    // check if email has been used
    if (checkIfEmailInUse( $conn, $email))
    {
        $Message = "The email you have entered is already in use. ";
    }

    // check if user is atleast 18 years old
    if (time() - strtotime($birthday) < 18 * 31536000)
    {
        $Message .= "You must be at least 18 years old. ";
    }

    // check if passwords match
    if (!($password === $checkPassword))
    {
        $Message .= "The passwords you have entered do not match. ";
    }

    if (isset($Message))
    {
        $Message = urlencode($Message);
        header("Location:nurse-register.php?Message=".$Message);
        die;
    }

    $data =[
        ':user_id' => $user_id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':birthday' => $birthday,
        ':email' => $email,
        ':password' => $password,
        ':messageFlag' => false,
    ];

    if ($pfType === "travelnursesdb")
    {
        $query = "INSERT INTO $pfType (user_id, first_name, last_name, birthday, email, password, stage, messageFlag) VALUES (:user_id, :first_name, :last_name, :birthday, :email, :password, :stage, :messageFlag)";
        $data[':stage'] = "Not Submitted";
    }
    else
    {
        $query = "INSERT INTO $pfType (user_id, first_name, last_name, birthday, email, password, messageFlag) VALUES (:user_id, :first_name, :last_name, :birthday, :email, :password, :messageFlag)"; 
    }

    $query_run = $conn->prepare($query);

    $query_execute = $query_run->execute($data);

    if ($query_execute) 
    {
        // set session variables to show registration success and log-in status
        $_SESSION['registration_success'] = true;
        $_SESSION['username'] = $first_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['pfType'] = $pfType;

        if ($pfType == "travelnursesdb")
        {
            header('Location: nurse-profile.php');
        }
        else
        {
            header('Location: propertyOwner-profile.php');
        }
    } else 
    {
        header('Location: index.php?registration=error');
    }
}
exit(0);


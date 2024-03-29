<?php
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_POST["sign-in-btn"]))
{
    $email = $_POST['signinemail'];
    $password = $_POST['signinpassword'];

    $stmt = $conn->prepare("SELECT user_id FROM travelnursesdb WHERE email = ? AND password = ? LIMIT 1");
    $stmt->execute(array($email, $password));
    $_SESSION['pfType'] = "travelnursesdb";

    if ($stmt->rowCount() <= 0)
    {
        $stmt = $conn->prepare("SELECT user_id FROM propertyownersdb WHERE email = ? AND password = ? LIMIT 1");
        $stmt->execute([$email, $password]);
        $_SESSION['pfType'] = "propertyownersdb";
    }

    if ($stmt->rowCount() > 0)
    {
        $_SESSION['user_id'] = $stmt->fetchColumn();
        header("Location:index.php");
        die;
    }
    else
    {
        unset($_SESSION["pfType"]);
        $Message = urlencode("The email or password you have entered is incorrect.");
        header("Location:index.php?Message=".$Message);
        die;
    }
}
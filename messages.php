<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);
//var_dump($_SESSION);

session_start();
include("connection.php");
include("phpfunctions.php");

$inputFileName = '';

// initialize $submission_stage with a default value
$submission_stage = "Not Submitted";

// check if user is logged in
if(isset($_SESSION['pfType']))
{
    $user = checkLogin($conn, $_SESSION['pfType']);

    // set verified flag to false
    $verifiedFlag = false;

    // check if user is verified in certdb
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
        $verifiedFlag = getVerificationStatus($conn, $user_id);
    }

    // check if certificate submission stage is set
    if(isset($_SESSION['submission_stage']))
    {
        $submission_stage = $_SESSION['submission_stage'];
    }
}

// user is not logged in, redirect to homepage
else
{
    header("Location: index.php");
    exit();
}

?>

<!-- Nurse profile header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Nurse Profile</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle.css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer></script>
</head>
<!-- Body of the page -->
<body>
    <!-- Top of the page -->
    <?php include('header.php');

<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php");

// set user session
if(isset($_SESSION['user_id'])) 
{
    $user_id = $_SESSION['user_id'];

    // get the file path from profile pictures db
    $query = "SELECT file_path FROM profile_pictures WHERE user_id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->execute(array(':user_id' => $user_id));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row) 
    {
        // echo path of file
        echo $row['file_path'];
    } 
    else 
    {
        // echo nothing when no pfp is found ?
        echo ""; 
    }
}


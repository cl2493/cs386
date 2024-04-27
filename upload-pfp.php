<?php
// error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("connection.php");

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    // checks for file upload w/out errors
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) 
    {
        // where we want the image to go
        $targetDir = "upload/";

        // store user session
        $user_id = $_SESSION['user_id']; 

        // get file name
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) 
        {
            // insert the file path into the profile_pictures table
            $query = "INSERT INTO profile_pictures (user_id, file_path) VALUES (:user_id, :file_path)";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(':user_id' => $user_id, ':file_path' => $targetFilePath));
            
            // check the profile type and redirect to respective profile
            if ($_SESSION['pfType'] == 'travelnursesdb') 
            {
                header("Location: nurse-profile.php");
            } 
            else if ($_SESSION['pfType'] == 'propertyownersdb') 
            {
                header("Location: propertyOwner-profile.php");
            }
            exit();
        } 

        // if there are errors during file upload
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
} 
else 
{
    // redirect back to appropriate profile page
    if ($_SESSION['pfType'] == 'travelnursesdb') 
    {
        header("Location: nurse-profile.php");
    } 
    else if ($_SESSION['pfType'] == 'propertyownersdb') 
    {
        header("Location: propertyOwner-profile.php");
    }
}


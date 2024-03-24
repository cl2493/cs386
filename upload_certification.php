<?php

session_start();
include("connection.php");


// check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // check if the file uploaded without errors
    if(isset($_FILES["certFile"]) && $_FILES["certFile"]["error"] == 0){
        // directory where we want to store the uploads
        $targetDir = "uploads/";

        $fileName = basename($_FILES["certFile"]["name"]);

        $targetFilePath = $targetDir.$fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // allow file formats (currently pdf)
        $allowedTypes = array('pdf');

        if(in_array($fileType, $allowedTypes)){

            // move the uploaded file to the directory
            if(move_uploaded_file($_FILES["certFile"]["tmp_name"], $targetFilePath)){

                // file upload successfully 
                echo "The file ".$fileName." has uploaded successfully.";
            }

            else{
                // for error handling
                echo "Sorry, there was an error uploading your file.";
                
            }
        }
        else{
            echo "Sorry, only PDF files are allowed.";
        }
    }
    else{
        echo "Sorry, an error occured during upload";
    }
}
    else{
        // redirect to the form page if accessed directly
        header("Location: nurse-profile.php");
        exit();
    }

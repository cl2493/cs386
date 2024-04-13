<?php
session_start();
include('connection.php');
require('vendor/autoload.php');

$s3 = new Aws\S3\S3Client([
    'version'  => 'lateset',
    'region'   => 'us-west-1',
]);

$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

// Check if the form was submitted
if (isset($_POST['submitBtn'])) {
    // get form data
    $address = $_POST['street-address'];
    $zip = $_POST['postal-code'];
    $city = $_POST['city'];
    $price = $_POST['price'];
    $bed = $_POST['bed'];
    $bath = $_POST['bath'];
    $user_id = $_SESSION['user_id'];

    // insert data into the database
    $query = "INSERT INTO listingsdb (user_id, address, zip, city, price,bed,bath) VALUES (:user_id, :address, :zip, :city, :price,:bed,:bath)";
    $query_run = $conn->prepare($query);

    $data =[
        ':user_id' => $user_id,
        ':address' => $address,
        ':zip' => $zip,
        ':city' => $city,
        ':price' => $price,
        ':bed' => $bed,
        ':bath' => $bath,
    ];

    $query_execute = $query_run->execute($data);

    // Prepared statement
    $query = "INSERT INTO listingimagedb (address, imagename,image) VALUES(?,?,?)";

    $statement = $conn->prepare($query);

    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'])) {
        // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that youthen store in your database, or similar 
        $filename = uniqid() . '_' . $_FILES['file']['name'];
        $file = fopen($_FILES['file']['tmp_name'], 'rb');
        $result = $s3->putObject([
                                 'Bucket' => $bucket,
                                 'Key' => $filename,
                                 'Body' => $file,
                                 'ACL' => 'public-read',
        ]);

        fclose($file);
    }

    /*
    // File name
    $filename = $_FILES['file']['name'];

    // Location
    $target_file ='upload/'. $filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){
        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            // Execute query
            $statement->execute(array($address,$filename,$target_file));
        }
    }
    */

    if ($query_execute) 
    {
        header('Location: propertyOwner-profile.php');
    } 
    else 
    {
        header('Location: index.php?registration=error');
    }
    exit(0);
}

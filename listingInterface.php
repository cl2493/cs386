<?php
session_start();
include('connection.php');

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

    // count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO listingimagedb (address, imagename,image) VALUES(?,?,?)";

    $statement = $conn->prepare($query);

    // Loop all files
    for($i=0;$i<$countfiles;$i++){
        // File name
        $filename = $_FILES['files']['tmp_name'];

        // Location
        $target_file = 'upload/'.$filename;

        // file extension
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");

        if(in_array($file_extension, $valid_extension)){
            // Upload file
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){
                // Execute query
	            $statement->execute(array($address,$filename,$target_file));
            }
        }
    }

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

<?php

include("connection.php");
include("phpfunctions.php");

$currentListing = unserialize($_POST['currentListing']);

// if PO accepted request
if (isset($_POST['accept']))
{

    // tell tn that their reservation has been accepted (availability is TN ID)
    notifyUser($conn, 2, $currentListing->availability, "travelnursesdb");

    // set TN property (column in database) to currentlisting address
    $query = "UPDATE travelnursesdb SET property=:property WHERE user_id=:user_id";
    $data = [
        ':property' => $currentListing->address,
        ':user_id' => $currentListing->availability,
    ];
    $query_run = $conn->prepare($query);
    $query_execute = $query_run->execute($data);

    // change listings availability to reserved
    $currentListing->changeAvailability($conn, "reserved");
}
// else if PO declined request
else if (isset($_POST['decline']))
{
    // tell tn that their reservation has been accepted (availability is TN ID)
    notifyUser($conn, 3, $currentListing->availability, "travelnursesdb");
}

header("Location:index.php");
<?php
session_start();
include('connection.php');
include('phpfunctions.php');

// Check if the form was submitted
if (isset($_POST['searchBtn']))
{
    // default query
    $query = "SELECT * FROM listingsdb WHERE availability = 'available'";
    $data = [];

    // check if user set location
    if (isset($_POST['location']) && strlen(trim($_POST['location'])) > 0)
    {
        $location = $_POST['location'];
        $query .= " AND city = :location";
        $data[":location"] = $location;
    }

    // check if user set bed number
    if (isset($_POST['bed']) && $_POST['bed'] > 0)
    {
        $bed = $_POST['bed'];
        $query .= " AND bed = :bed";
        $data[":bed"] = $bed;
    }

    // TODO: OTHER FILTERING OPTIONS

    $_SESSION['query'] = $query;
    $_SESSION['data'] = $data;
    header("Location:listing.php");
    exit;
}
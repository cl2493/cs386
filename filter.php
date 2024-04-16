<?php
session_start();
include('connection.php');
include('phpfunctions.php');

// Check if the form was submitted
if (isset($_POST['searchBtn']) || isset( $_POST['filterBtn']))
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

    // set price range for listings
    // if not set, it'll do default range
    $query .= " AND price >= :minPrice AND price <= :maxPrice";
    $minPrice =  $_POST['minPrice'];
    $maxPrice =  $_POST['maxPrice'];
    $data[":minPrice"] =$minPrice;
    $data[":maxPrice"] = $maxPrice;

    // TODO: OTHER FILTERING OPTIONS
    
    $_SESSION['query'] = $query;
    $_SESSION['data'] = $data;
    header("Location:listing.php");
    exit;
}
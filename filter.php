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

    // check if user set bath number
    if (isset($_POST['bath']) && $_POST['bath'] > 0)
    {
        $bath = $_POST['bath'];
        $query .= " AND bath = :bath";
        $data[":bath"] = $bath;
    }

    // set price range for listings
    // if not set, it'll do default range
    $query .= " AND price >= :minPrice AND price <= :maxPrice";
    $data[":minPrice"] = 0;
    $data[":maxPrice"] = 10000;

    if (isset($_POST["minPrice"]))
    {
        $minPrice =  $_POST['minPrice'];
        $data[":minPrice"] = $minPrice;
    }

    if (isset($_POST["maxPrice"]))
    {
        $maxPrice =  $_POST['maxPrice'];
        $data[":maxPrice"] = $maxPrice;
    }

    // TODO: LEASE LENGTH
    
    $_SESSION['query'] = $query;
    $_SESSION['data'] = $data;
    header("Location:listing.php");
    exit;
}
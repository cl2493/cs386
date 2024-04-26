<?php
session_start();
include("connection.php");
include("phpfunctions.php");

if (isset($_POST['rate-Btn']))
{
    $user = checkLogin($conn,"travelnursesdb");

    // get listing
    if (!isset($_SESSION['query']))
    {
        // default query
        $query = "SELECT * FROM listingsdb WHERE availability = 'available'";
        $data = [];
    }
    else
    {
        // filtered query
        $query = $_SESSION['query'];
        $data = $_SESSION['data'];
    }
    $listings = getListings($conn, $query, $data);
    $listing = $_GET['Listing'];

    // rate listing
    $user->rateListing($conn, $listings[$listing], $_POST['rating']);
}
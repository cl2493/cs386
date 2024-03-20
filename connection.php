<?php
$dsn = 'mysql:host=bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=v3631j1wxf69fwg6';
$username = 'rz3g4npuxheqkm4q';
$password = 'w16mgna61998973p';

// Create connection
try
{
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)
{
    echo "Connection failed: ". $e->getMessage();
}


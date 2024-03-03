<?php
$dsn = 'mysql://rz3g4npuxheqkm4q:w16mgna61998973p@bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/v3631j1wxf69fwg6';
$username = 'rz3g4npuxheqkm4q';
$password = 'w16mgna61998973p';

// Create connection
try
{
    $pdo = new PDO($dsn, $username, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)
{
    echo "Connection failed: ". $e->getMessage();
}


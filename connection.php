<?php
$dsn = 'bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'rz3g4npuxheqkm4q';
$password = 'w16mgna61998973p';

// Create connection
try
{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)
{
    echo "Connection failed: ". $e->getMessage();
}


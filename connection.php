<?php

$hostname = $dbparts['bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	'];
$username = $dbparts['rz3g4npuxheqkm4q']
$password = $dbparts['w16mgna61998973p']
$dbname = $dbparts['v3631j1wxf69fwg6']

$link = mysqli_connect($hostname, $username, $password, $dbname);

if (!$link)
   {
    die('Could not connect:' . mysqli_error());
   }
echo 'Connected successfully';
?>

<?php
session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
    unset($_SESSION['pfType']);
    unset($_SESSION['username']);
    unset($_SESSION['registration_success']);
}

header("Location:index.php");
die;
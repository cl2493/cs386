<?php

function checkLogin($conn, $pfType)
{
    if (isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
        //$query = "SELECT * FROM $pfType WHERE user_id = $user_id LIMIT 1";
        //$stmt = $conn->prepare($query);
        //$stmt->execute();

        $stmt = $conn->prepare("SELECT * FROM $pfType WHERE user_id <= ? LIMIT 1");
        $stmt->execute([$user_id]);

        $user_data = $stmt->fetch();
        return $user_data;
    }
    header('Location: index.php');
    die;
}

function randomNum($length,$pfType,$conn)
{
    $newId = "";
    for ($i = 0; $i < $length; $i++)
    {
        $newId .= rand(0,9);
    }
    $stmt = $conn->prepare("SELECT id FROM $pfType WHERE user_id = ? LIMIT 1");
    $stmt->execute([$newId]);
    if ($stmt->rowCount() == 1)
        {
            return randomNum($length);
        }
    return $newId;
}


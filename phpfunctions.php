<?php
include("classes.php");
function checkLogin($conn, $pfType)
{
    if (isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("SELECT * FROM $pfType WHERE user_id = ? LIMIT 1");
        $stmt->execute([$user_id]);

        $user_data = $stmt->fetch();

        if ($pfType == "travelnursesdb")
        {
            $user = new TravelNurse($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5],$user_data[7]);
        }
        else
        {
            $user = new PropertyOwner($user_data[1],$user_data[2],$user_data[3],$user_data[4],$pfType,$user_data[5]);
        }
        return $user;
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
            return randomNum($length, $pfType, $conn);
        }
    return $newId;
}

function checkIfEmailInUse( $conn, $email)
{
    $stmt = $conn->prepare("SELECT * FROM travelnursesdb WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 1)
    {
        return true;
    }
    $stmt = $conn->prepare("SELECT * FROM propertyownersdb WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    if ($stmt->rowCount() == 1)
    {
        return true;
    }
    return false;
}



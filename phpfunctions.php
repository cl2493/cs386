<?php

function randomNum($length,$pfType,$conn)
{
    $newId = "";
    for ($i = 0; $i < $length; $i++)
    {
        $newId .= rand(0,9);
    }

    if ($pfType == "travelnurse")
    {
        $stmt = $conn->prepare("SELECT id FROM travelnursesdb WHERE user_id = ? LIMIT 1");
    }
    else
    {
        $stmt = $conn->prepare("SELECT id FROM propertyownersdb WHERE user_id = ? LIMIT 1"); 
    }
    $stmt->execute([$newId]);
    if ($stmt->rowCount() == 1)
        {
            return randomNum($length);
        }
    return $newId;
}



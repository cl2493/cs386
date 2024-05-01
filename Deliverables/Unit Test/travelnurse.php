<?php

namespace App;

class User {
    public $user_id;
    public $first_name;
    public $last_name;
    public $birthday;
    public $pfType;
    public $email;
    public $stage;
    public $messageFlag;
    public $phone;

    function __construct($user_id, $first_name, $last_name, $birthday, $pfType, $email, $stage, $messageFlag) {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthday = $birthday;
        $this->pfType = $pfType;
        $this->email = $email;
        $this->stage = $stage;
        $this->messageFlag = $messageFlag;
    }

    function getPhoneNumber($conn)
    {
        $data = [
            ":user_id" => $this->user_id,
        ];
        $query = "SELECT phone_number FROM user_phone_numbers WHERE user_id=:user_id";

        $query_run = $conn->prepare($query);
        $query_run->execute($data);

        $phoneNumber = $query_run->fetchAll();

        // check if user has phone number
        if (count($phoneNumber) == 0)
        {
            $this->phone = "No Phone Number";
            return false;
        }
        // else return the phone number
        $this->phone = $phoneNumber[0][0];
        return true;
    }

    function changeName($conn, $firstName, $lastName) {
        $data = [];
        $query = "UPDATE $this->pfType SET";

        if ($firstName != $this->first_name) {
            $query .= " first_name=:first_name";
            $data[':first_name'] = $firstName;
        }

        if ($lastName != $this->last_name) {
            if ($firstName != $this->first_name)
            {
                $query .= ",";
            }
            $query .= " last_name=:last_name";
            $data[':last_name'] = $lastName;
        }

        if (!empty($data)) {
            $query .= " WHERE user_id=:user_id";
            $data[':user_id'] = $this->user_id;

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function changeBirth($conn, $newBirthday) {
        if ($newBirthday != $this->birthday) {
            $query = "UPDATE $this->pfType SET birthday=:birthday WHERE user_id=:user_id";
            $data = [
                ':birthday' => $newBirthday,
                ':user_id' => $this->user_id,
            ];

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function changeEmail($conn, $newEmail) {
        if ($newEmail != $this->email) {
            $query = "UPDATE $this->pfType SET email=:email WHERE user_id=:user_id";
            $data = [
                ':email' => $newEmail,
                ':user_id' => $this->user_id,
            ];

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function changeNumber($conn, $newNumber) {
        // if new number is different from current number
        if ($newNumber != $this->phone) {
            $query = "UPDATE user_phone_numbers SET phone_number=:phone_number WHERE user_id=:user_id";
            $data = [
                ':email' => $newNumber,
                ':user_id' => $this->user_id,
            ];

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function updateStage($conn, $newStage) {
        $query = "UPDATE $this->pfType SET stage=:stage WHERE user_id=:user_id";
        $data = [
            ':stage' => $this->stage,
            ':user_id' => $this->user_id,
        ];
        
        $query_run = $conn->prepare($query);
        $query_execute = $query_run->execute($data);
        
        if ($query_execute) {
            return true;
        }
        return false;
    }
}

class TravelNurse extends User {
    public $ratings = array();
    public $reservedProperty;

    function __construct($user_id, $first_name, $last_name, $birthday, $pfType, $email, $stage, $messageFlag, $property)
    {
        $this->reservedProperty = $property;
        parent::__construct($user_id,$first_name, $last_name, $birthday, $pfType, $email,$stage,$messageFlag);
    }

    // function to change tn rating for listing
    function rateListing($conn, $listing, $rating)
    {
        $query = "UPDATE ratings SET rating=:rating WHERE address=:address AND user_id=:user_id";

        $data = [
            ':address' => $listing->address,
            ':user_id' => $this->user_id,
            ':rating' => $rating
        ];

        $query_run = $conn->prepare($query);
        
        $query_execute = $query_run->execute($data);
        
        if ($query_execute) 
        {
            return true;
        }
        return false;
    }

    // function to get all travel nurse's ratings
    function getRatings($conn)
    {
        // query to get all ratings of user
        $query = "SELECT address,rating FROM ratings WHERE user_id=:user_id";
        $idArray = [
            ':user_id' => $this->user_id,
        ];

        $query_run = $conn->prepare($query);
        $query_run->execute($idArray);

        $ratings = $query_run->fetchAll();

        for ($rating = 0; $rating < count($ratings); $rating++)
        {
            $this->ratings[$ratings[$rating][0]] = $ratings[$rating][1];
        }
    }
}
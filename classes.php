<?php

interface DatabaseConnection {
    public function prepare($query);
    public function execute($data);
}

class User {
    public $user_id;
    public $first_name;
    public $last_name;
    public $birthday;
    public $pfType;
    public $email;

    function __construct($user_id, $first_name, $last_name, $birthday, $pfType, $email) {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birthday = $birthday;
        $this->pfType = $pfType;
        $this->email = $email;
    }

    function changeName(DatabaseConnection $conn, $firstName, $lastName) {
        $data = [];
        $query = "UPDATE $this->pfType SET";

        if ($firstName != $this->first_name) {
            $query .= " first_name=:first_name,";
            $data['first_name'] = $firstName;
        }

        if ($lastName != $this->last_name) {
            $query .= " last_name=:last_name";
            $data['last_name'] = $lastName;
        }

        if (!empty($data)) {
            $query .= " WHERE user_id=:user_id";
            $data['user_id'] = $this->user_id;

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function changeBirth(DatabaseConnection $conn, $newBirthday) {
        if ($newBirthday != $this->birthday) {
            $query = "UPDATE $this->pfType SET birthday=:birthday WHERE user_id=:user_id";
            $data = [
                'birthday' => $newBirthday,
                'user_id' => $this->user_id,
            ];

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }

    function changeEmail(DatabaseConnection $conn, $newEmail) {
        if ($newEmail != $this->email) {
            $query = "UPDATE $this->pfType SET email=:email WHERE user_id=:user_id";
            $data = [
                'email' => $newEmail,
                'user_id' => $this->user_id,
            ];

            $query_run = $conn->prepare($query);
            $query_execute = $query_run->execute($data);

            if ($query_execute) {
                return true;
            }
        }
        return false;
    }
}

class TravelNurse extends User {
    public $submission_stage;

    function updateStage(DatabaseConnection $conn, $newStage) {
        $query = "UPDATE $this->pfType SET stage=:stage WHERE user_id=:user_id";
        $data = [
            'stage' => $this->submission_stage,
            'user_id' => $this->user_id,
        ];
        
        $query_run = $conn->prepare($query);
        $query_execute = $query_run->execute($data);
        
        if ($query_execute) {
            return true;
        }
        return false;
    }
}

class PropertyOwner extends User {
    public $pfListings = array();

    function addListing($listing) {
        array_push($this->pfListings, $listing);
    }

    function removeListing($listing) {
        $index = array_search($listing, $this->pfListings);
        if ($index !== false) {
            array_splice($this->pfListings, $index, 1);
            return true;
        }
        return false;
    }
}

class Listing {
    public $address;
    public $zip;
    public $city;
    public $price;
    public $images = array();

    function __construct($address, $zip, $city, $price) {
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->price = $price;
    }

    function addImage($newImage) {
        array_push($this->images, $newImage); 
    }

    function removeImage($image) {
        $index = array_search($image, $this->images);
        if ($index !== false) {
            array_splice($this->images, $index, 1);
            return true;
        }
        return false;
    }
}

class Image {
    public $imageName;
    public $image;

    public function __construct($imageName, $image) {
        $this->imageName = $imageName;
        $this->image = $image;
    }
}

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
    public $stage;
    public $messageFlag;

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

    function changeName(DatabaseConnection $conn, $firstName, $lastName) {
        $data = [];
        $query = "UPDATE $this->pfType SET";

        if ($firstName != $this->first_name) {
            $query .= " first_name=:first_name,";
            $data[':first_name'] = $firstName;
        }

        if ($lastName != $this->last_name) {
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

    function changeBirth(DatabaseConnection $conn, $newBirthday) {
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

    function changeEmail(DatabaseConnection $conn, $newEmail) {
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

    function updateStage(DatabaseConnection $conn, $newStage) {
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
    public $user_id;
    public $address;
    public $zip;
    public $city;
    public $price;
    public $bed;
    public $bath;
    public $availability;
    public $images = array();

    function __construct($user_id, $address, $zip, $city, $price, $bed, $bath, $availability)
    {
        $this->user_id = $user_id;
        $this->address = $address;
        $this->zip = $zip;
        $this->city = $city;
        $this->price = $price;
        $this->bed = $bed;
        $this->bath = $bath;
        $this->availability = $availability;
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

    // function to change listings availability
    function changeAvailability($conn, $newAvailability) {
        // set listings to newAvailability (travelnurses's user_id)
        $query = "UPDATE listingsdb SET availability=:availability WHERE address=:address";
        $data = [
            ':availability' => $newAvailability,
            ':address' => $this->address,
        ];
        
        $query_run = $conn->prepare($query);
        $query_execute = $query_run->execute($data);

        // if listing has been reserved
        if ($newAvailability != "available")
        {
            // notify the property owner
            $this->notifyPropertyOwner($conn);
        }

        if ($query_execute) {
            return true;
        }
        return false;
    }
    
    // function that notifies the owner of the listing
    private function notifyPropertyOwner($conn)
    {
        // change property owners messageFlag to true
        $query = "UPDATE propertyownersdb SET messageFlag=:messageFlag WHERE user_id=:user_id";
        $data = [
            ':messageFlag' => 1,
            ':user_id' => $this->user_id,
        ];

        $query_run = $conn->prepare($query);
        $query_execute = $query_run->execute($data);

        if ($query_execute)
        {
            return true;
        }

        return false;
    }
}

class Image {
    public $address;
    public $imageName;
    public $image;

    public function __construct($address, $imageName, $image) {
        $this->address = $address;
        $this->imageName = $imageName;
        $this->image = $image;
    }
}

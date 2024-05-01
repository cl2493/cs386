<?php

namespace App;

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
        // set listings to newAvailability
        $query = "UPDATE listingsdb SET availability=:availability WHERE address=:address";
        $data = [
            ':availability' => $newAvailability,
            ':address' => $this->address,
        ];
        
        $query_run = $conn->prepare($query);
        $query_execute = $query_run->execute($data);

        // if listing has been reserved
        if ($newAvailability == "reserved")
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
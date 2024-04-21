<?php

use PHPUnit\Framework\TestCase;
include("app/listing.php");

class listingTest extends PHPUNIT\Framework\TestCase{
    protected function getMockedPDO()
    {
       $query = $this->createMock('\PDOStatement');
       $query->method('execute')->willReturn(true);

       $db = $this->getMockBuilder('\PDO')
           ->disableOriginalConstructor()
           ->onlyMethods(['prepare'])
           ->getMock();

       $db->method('prepare')->willReturn($query);

       return $db;

    }

    public function testChangeListingAvailability()
    {
        // mock listing data
        $user_id = 123;
        $address = "Near Patrick's Rock";
        $zip = 86001;
        $city = "Bikini Bottom";
        $price = 1000;
        $bed = 100;
        $bath = 100;
        $availability = "available";

        // create mock listing and mock PDO
        $fakeListing = new App\Listing($user_id, $address, $zip, $city, $price, $bed, $bath, $availability);
        $conn = $this->getMockedPDO();

        // change listing availability
        $result = $fakeListing->changeAvailability($conn, "reserved");

        $this->assertTrue($result);
    }
}
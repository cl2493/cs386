<?php

use PHPUnit\Framework\TestCase;
include("app/filter.php");

class filterTest extends PHPUNIT\Framework\TestCase{
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

    public function testGetListings()
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
        $filter = new App\Filter();
        $conn = $this->getMockedPDO();

        // TEST CASE: ALL LISTINGS
        $query = "SELECT * FROM listingsdb";
        $data = [];
        $listings = $filter->getListings($conn, $query, $data);
        $this->assertTrue($listings == array());

        // TEST CASE: ALL AVAILABLE LISTINGS
        $query = "SELECT * FROM listingsdb WHERE availability = 'available'";
        $data = [];
        $listings = $filter->getListings($conn, $query, $data);
        $this->assertTrue($listings == array());

        // TEST CASE: ALL AVAILABLE LISTINGS
        $query = "SELECT * FROM listingsdb WHERE availability = 'available'";
        $data = [];
        $listings = $filter->getListings($conn, $query, $data);
        $this->assertTrue($listings == array());

        // TEST CASE: ALL AVAILABLE LISTINGS
        $query = "SELECT * FROM listingsdb WHERE availability = 'available' AND city = :location";
        $data[":location"] = "fakeLocation";
        $listings = $filter->getListings($conn, $query, $data);
        $this->assertTrue($listings == array());
    }
}
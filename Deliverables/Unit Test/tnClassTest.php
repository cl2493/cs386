<?php

use PHPUnit\Framework\TestCase;
include("app/travelnurse.php");

class tnClassTest extends PHPUNIT\Framework\TestCase{

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

    public function testTNClass()
    {
        // mock travel nurse data
        $userId = 12345;
        $firstName = "Bob";
        $lastName = "The Builder";
        $birthday = "11-3-2003";
        $pfType = "travelnursesdb";
        $email = "btb@gmail.com";
        $stage = "Not Submitted";
        $messageFlag = 0;
        $property = "Near Patrick's Rock";

        // create mock travelnurse
        $user = new App\TravelNurse($userId, $firstName, $lastName, $birthday, $pfType, $email, $stage, $messageFlag, $property);
        $conn = $this->getMockedPDO();

        // TEST CASE: check if all attributes were added.
        $this->assertTrue($user->user_id == "12345");
        $this->assertTrue($user->first_name == "Bob");
        $this->assertTrue($user->last_name == "The Builder");
        $this->assertTrue($user->birthday == "11-3-2003");
        $this->assertTrue($user->pfType == "travelnursesdb");
        $this->assertTrue($user->email == "btb@gmail.com");
        $this->assertTrue($user->stage == "Not Submitted");
        $this->assertTrue($user->messageFlag == 0);
        $this->assertTrue($user->reservedProperty == "Near Patrick's Rock");
        $user->getRatings($conn);
        $this->assertTrue($user->ratings == array());
    }
}
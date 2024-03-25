<?php

use PHPUnit\Framework\TestCase;
include("app/userRegisteration.php");

class RegistrationTest extends PHPUNIT\Framework\TestCase {

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

    public function testFormSubmission() {
        // Simulate form submission data
        $email = 'john@example.com';
        $password = 'password123';

        // Instantiate UserRegistration class
        $test = new App\UserRegistration();
        $conn = $this->getMockedPDO();
        // Call registerUser() method
        $result = $test->registerUser($conn, $email, $password);
        // Assertions
        $this->assertTrue($result); // Check if registration was successful

        $result = $test->registerUser($conn,'sally@example.com', $password);
        // Assertions
        $this->assertTrue($result); // Check if registration was successful
        
        $result = $test->registerUser($conn,'1234@example.com', $password);
        $this->assertTrue($result); // Check if registration was successful

        $result = $test->registerUser($conn,'as12@example.com', $password);
        $this->assertTrue($result); // Check if registration was successful
    }
}


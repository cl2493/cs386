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

        // Check session variables
        //$this->assertTrue($_SESSION['registration_success']);
        //$this->assertEquals('John', $_SESSION['username']);
        //$this->assertEquals('travelnursesdb', $_SESSION['pfType']);
    }
}


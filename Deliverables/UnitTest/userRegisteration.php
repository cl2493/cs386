<?php

namespace App;

class UserRegistration {
    public function registerUser($conn, $email, $password) {
        $query = "INSERT INTO (email, password) VALUES (:email, :password)";
        $query_run = $conn->prepare($query);

        $data = [
            ':email' => $email,
            ':password' => $password,
        ];

        $query_execute = $query_run->execute($data);

        $_SESSION['email'] = $email;

        return $query_execute;
    }
}


<?php
var_dump($_POST);
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create connection
    $dsn = 'mysql:host=bqmayq5x95g1sgr9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=v3631j1wxf69fwg6';
    $username = 'rz3g4npuxheqkm4q';
    $db_password = 'w16mgna61998973p';

    // Create connection
    try {
        $pdo = new PDO($dsn, $username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // insert data into the database
        $sql = $pdo->prepare("INSERT INTO travelnursesdb (first_name, last_name, birthday, email, password) VALUES (?, ?, ?, ?, ?)");

        // bind parameters
        $sql->bindParam(1, $first_name);
        $sql->bindParam(2, $last_name);
        $sql->bindParam(3, $birthday);
        $sql->bindParam(4, $email);
        $sql->bindParam(5, $password);

        if ($sql->execute()) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $sql->errorInfo()[2];
        }

        $pdo = null; // Close the database connection
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

} else {
    // If the form was not submitted via POST method, redirect to the form page
    header("Location: nurse-register.php");
    exit; // Make sure to exit after redirection
}

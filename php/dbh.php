<?php
$host = 'localhost';
$dbname = 'myfristdatabase';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("connection failed: " . $e->getMessage());
}   


/* We can also use myqli method to connect to the databse called myfristdatabse
    Example 
    <?php
        $servername = "localhost"; // Change this to your MySQL server hostname
        $username = "username"; // Change this to your MySQL username
        $password = "password"; // Change this to your MySQL password
        $database = "database_name"; // Change this to the name of your MySQL database

        Create a connection to the MySQL database
        $conn = mysqli_connect($servername, $username, $password, $database);

        Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        echo "Connected successfully";

        Close the connection
        mysqli_close($conn);
       

*/ 
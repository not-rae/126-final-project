<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "honestore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

<<<<<<< HEAD
// echo "Connected successfully <br/>";
=======
>>>>>>> 0a1c2b0e367132f07932a947b762de25662756c0
?>
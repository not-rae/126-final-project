<?php

include "DBConnector.php";

$sql = "CREATE TABLE IF NOT EXISTS admin_password (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);";

// Check if both table creation queries execute successfully
if ($conn->query($sql) === TRUE) {
    echo "Database table created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

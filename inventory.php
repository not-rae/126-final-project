<?php
include 'DBconnector.php';

$sql = "CREATE TABLE IF NOT EXISTS inventory (
    item_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT(11) NOT NULL DEFAULT 0
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'inventory' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

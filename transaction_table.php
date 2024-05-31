<?php
include 'DBconnector.php';

$sql = "CREATE TABLE IF NOT EXISTS transaction (
    order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    order_dateTime datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    item_id INT(11) NOT NULL,
    order_quantity INT(4) NOT NULL,
    purchase_total DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(15) NOT NULL,
    cash_purchase DECIMAL(10, 2) NOT NULL,
    gcash_purcahse INT(15) NOT NULL,
    purchase_change DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'transaction' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

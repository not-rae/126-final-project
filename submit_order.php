<?php
// Assuming you've established the database connection before this point

// Retrieve form data
$customer_name = $_POST['customer_name'];
$order_quantity = $_POST['order_quantity'];
$payment_method = $_POST['payment_method'];
$cash_purchase = $_POST['cash_purchase'];
$gcash_purchase = $_POST['gcash_purchase'];
$purchase_total = $_POST['purchase_total']; // Retrieve purchase total

// Assuming you have your SQL query to insert data into the database
$sql = "INSERT INTO your_table_name (customer_name, order_quantity, payment_method, cash_purchase, gcash_purchase, purchase_total) 
        VALUES ('$customer_name', '$order_quantity', '$payment_method', '$cash_purchase', '$gcash_purchase', '$purchase_total')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
include 'DBconnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $order_quantity = (int)$_POST['order_quantity'];
    $purchase_total = (float)$_POST['purchase_total'];
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $cash_purchase = isset($_POST['cash_purchase']) ? (float)$_POST['cash_purchase'] : 0;
    $gcash_purchase = isset($_POST['gcash_purchase']) ? mysqli_real_escape_string($conn, $_POST['gcash_purchase']) : '';
    $purchase_change = 0;


    $sql = "INSERT INTO transaction (customer_name, item_id, order_quantity, purchase_total, payment_method, cash_purchase, gcash_purchase, purchase_change)
            VALUES ('$customer_name', 1, $order_quantity, $purchase_total, '$payment_method', $cash_purchase, '$gcash_purchase', $purchase_change)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php
include 'DBconnector.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $query = "SELECT * FROM transaction WHERE order_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $transaction = $result->fetch_assoc();
        } else {
            echo "Transaction not found.";
            exit;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
} else {
    echo "No transaction ID provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $customer_name = $_POST['customer_name'];
    $order_dateTime = $_POST['order_dateTime'];
    $item_id = $_POST['item_id'];
    $order_quantity = $_POST['order_quantity'];
    $purchase_total = $_POST['purchase_total'];
    $payment_method = $_POST['payment_method'];
    $cash_purchase = $_POST['cash_purchase'];
    $gcash_purchase = $_POST['gcash_purchase'];
    $purchase_change = $_POST['purchase_change'];

    $query = "UPDATE transaction SET customer_name=?, order_dateTime=?, item_id=?, order_quantity=?, purchase_total=?, payment_method=?, cash_purchase=?, gcash_purchase=?, purchase_change=? WHERE order_id=?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssiidssisi", $customer_name, $order_dateTime, $item_id, $order_quantity, $purchase_total, $payment_method, $cash_purchase, $gcash_purchase, $purchase_change, $order_id);
        if ($stmt->execute()) {
            header("Location: transactionPage.php");
            exit();
        } else {
            echo "Error updating transaction: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link rel="stylesheet" href="editTransactionStyle.css">
</head>
<body>
    <div class="container">
        <h2>Edit Transaction</h2>
        <form method="post" action="edit_transaction.php?id=<?php echo htmlspecialchars($transaction['order_id']); ?>">
            <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($transaction['order_id']); ?>">
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($transaction['customer_name']); ?>" required>
            
            <label for="order_dateTime">Date and Time:</label>
            <input type="datetime-local" id="order_dateTime" name="order_dateTime" value="<?php echo date('Y-m-d\TH:i', strtotime($transaction['order_dateTime'])); ?>" required>
            
            <label for="item_id">Product ID:</label>
            <input type="number" id="item_id" name="item_id" value="<?php echo htmlspecialchars($transaction['item_id']); ?>" required>
            
            <label for="order_quantity">Quantity:</label>
            <input type="number" id="order_quantity" name="order_quantity" value="<?php echo htmlspecialchars($transaction['order_quantity']); ?>" required>
            
            <label for="purchase_total">Total:</label>
            <input type="number" step="0.01" id="purchase_total" name="purchase_total" value="<?php echo htmlspecialchars($transaction['purchase_total']); ?>" required>
            
            <label for="payment_method">Payment Method:</label>
            <input type="text" id="payment_method" name="payment_method" value="<?php echo htmlspecialchars($transaction['payment_method']); ?>" required>
            
            <label for="cash_purchase">Cash Payment:</label>
            <input type="number" step="0.01" id="cash_purchase" name="cash_purchase" value="<?php echo htmlspecialchars($transaction['cash_purchase']); ?>" required>
            
            <label for="gcash_purchase">Gcash Ref. No.:</label>
            <input type="number" id="gcash_purchase" name="gcash_purchase" value="<?php echo htmlspecialchars($transaction['gcash_purchase']); ?>" required>
            
            <label for="purchase_change">Change:</label>
            <input type="number" step="0.01" id="purchase_change" name="purchase_change" value="<?php echo htmlspecialchars($transaction['purchase_change']); ?>" required>
            
            <button type="submit">Update Transaction</button>
        </form>
    </div>
</body>
</html>

<?php
include 'DBconnector.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $order_id = intval($_GET['id']);

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM transaction WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the transaction page after successful deletion
        header("Location: transactionPage.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();
?>

<?php
include 'DBconnector.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM inventory WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: inventoryPage.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

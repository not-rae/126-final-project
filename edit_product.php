<?php
include 'DBconnector.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventory WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $restockDate = $_POST['restockDate'];

    $query = "UPDATE inventory SET item_name = ?, category = ?, price = ?, quantity = ?, restockDate = ? WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssisi", $item_name, $category, $price, $quantity, $restockDate, $id);
    if ($stmt->execute()) {
        header("Location: inventoryPage.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
    <h1 class="edit-title">Edit Product</h1>
    <div class="form-container">
        <form method="post" action="edit_product.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['item_id']); ?>">
            <label for="item_name">Product Name:</label>
            <input type="text" name="item_name" value="<?php echo htmlspecialchars($product['item_name']); ?>" required>

            <label for="category">Category: <span>*</span></label>
            <select id="category" name="category" required>
                <option>Product Categories</option>
                <option value="coffee">Coffee</option>
                <option value="beverages">Beverages</option>
                <option value="snacks">Snacks</option>
                <option value="noodles">Noodles</option>
                <option value="school-supplies">School Supplies</option>
                <option value="toiletries">Toiletries and Laundry</option>
                <option value="others">Others</option>
            </select><br>

            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>

            <label for="restockDate">Restock Date:</label>
            <input type="date" name="restockDate" value="<?php echo htmlspecialchars($product['restockDate']); ?>" required>
            <input type="submit" value="Save Changes">
        </form>
    </div>

</body>
</html>

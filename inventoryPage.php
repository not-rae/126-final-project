<?php

include 'DBconnector.php';

$query = "SELECT * FROM inventory";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Inventory</title>
    <link rel="stylesheet" href="adminStyle.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('inventory-tab').classList.add('active');
        });
    </script>
</head>
<body>
    <header>  
        <div class="title">
            <h1 class="honestore">HONESTORE</h1>
        </div>
        <div class="logout">
            <img class="logout-button" src="logout-button.svg" alt="Logout Button">
            <h3 class="logout-text">Logout</h3>
        </div>  
    </header>
    
    <div class="spacer"></div>

    <nav class="dashboard">
        <a href="inventoryPage.php" class="tab" id="inventory-tab">Inventory</a>
        <a href="transactionPage.php" class="tab" id="transactions-tab">Transactions</a>
        <a href="add_products.php" class="tab" id="add-product-tab">Add Product</a>
        <div class="category-dropdown">
            <select name="categories" id="categories">
                <option value="all">Product Categories</option>
                <option value="coffee">Coffee</option>
                <option value="beverages">Beverages</option>
                <option value="snacks">Snacks</option>
                <option value="noodles">Noodles</option>
                <option value="school-supplies">School Supplies</option>
                <option value="toiletries">Toiletries and Laundry</option>
                <option value="others">Others</option>
            </select>
        </div>
    </nav>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Restock Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['item_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['restockDate']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_product.php?id=" . htmlspecialchars($row['item_id']) . "' class='edit-button'>Edit</a> ";
                        echo "<a href='delete_product.php?id=" . htmlspecialchars($row['item_id']) . "' class='delete-button' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No products found</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>

<?php
$conn->close();
?>

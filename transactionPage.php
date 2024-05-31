<?php

include 'DBconnector.php';

$query = "SELECT * FROM transaction";
$result = $conn->query($query);

$totalSale = 0; // Initialize total sale variable

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Transaction</title>
    <link rel="stylesheet" href="adminStyle.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('transactions-tab').classList.add('active');
        });

        function searchTransactions() {
            var input = document.getElementById('search').value.trim().toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var customerName = row.cells[1].textContent.trim().toLowerCase();
                if (customerName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
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
        <div class="date-dropdown">
            <input type="text" id="search" onkeyup="searchTransactions()" placeholder="Search by Customer Name">
        </div>
    </nav>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Date and Time</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Cash Payment</th>
                    <th>Gcash Ref. No.</th>
                    <th>Change</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['order_dateTime']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['item_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['order_quantity']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['purchase_total']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cash_purchase']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gcash_purchase']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['purchase_change']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_transaction.php?id=" . htmlspecialchars($row['order_id']) . "' style='color: blue; font-weight: bold;'>Edit</a> ";
                        echo "<a href='delete_transaction.php?id=" . htmlspecialchars($row['order_id']) . "' style='color: red; font-weight: bold;' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                        
                        $totalSale += $row['purchase_total'];
                    }
                } else {
                    echo "<tr><td colspan='11'>No transaction record</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    
    <div class="total-sale">TOTAL SALE: <?php echo $totalSale; ?></div>
    
</body>
</html>

<?php

include 'DBconnector.php';

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
            <select name="date" id="date">
                <option value="all">Choose Date</option>
            </select>
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
                    <th>Payment/Reference No.</th>
                    <th>Change</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#000143</td>
                    <td>Daniella Pailden</td>
                    <td>05/23/24 1:52PM</td>
                    <td>#000001</td>
                    <td>1</td>
                    <td>00.00</td>
                    <td>Cash</td>
                    <td>00.00</td>
                    <td>00.00</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>

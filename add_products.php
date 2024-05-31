<?php

include 'DBconnector.php';

if(isset($_POST['post'])){
    $productName = $_POST['productName'];
    $productName = filter_var($productName, FILTER_SANITIZE_STRING);
    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);
    $unitPrice = $_POST['unitPrice'];
    $unitPrice = filter_var($unitPrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantity = $_POST['quantity'];
    $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);
    $restockingDate = $_POST['restockingDate'];
    $restockingDate = filter_var($restockingDate, FILTER_SANITIZE_STRING);

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
    $rename_image_01 = $_POST['productName'].'.'.$image_01_ext;
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_folder = 'uploaded_files/'.$rename_image_01;

    if(!empty($image_01)){
        if($image_01_size > 2000000){
            $warning_msg[] = 'image 01 size is too large!';
        }else{
            move_uploaded_file($image_01_tmp_name, $image_01_folder);
        }
    }else{
        $rename_image_01 = '';
    }

    if(empty($warning_msg)){
        $add_product = $conn->prepare("INSERT INTO `inventory` (item_name, category, price, quantity, restockDate, image_path) VALUES (?, ?, ?, ?, ?, ?)");
        $add_product->bind_param("ssdiss", $productName, $category, $unitPrice, $quantity, $restockingDate, $rename_image_01);
        $add_product->execute();
        $add_product->close();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="adminStyle.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('add-product-tab').classList.add('active');
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

    <div class="form-container">
        <form action="add_products.php" method="post" enctype="multipart/form-data">
            <label for="productName">Product Name: <span>*</span></label>
            <input type="text" id="productName" name="productName" required><br>

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

            <label for="unitPrice">Unit Price: <span>*</span></label>
            <input type="number" id="unitPrice" name="unitPrice" step="0.10" required><br>

            <label for="quantity">Quantity: <span>*</span></label>
            <input type="number" id="quantity" name="quantity" required><br>

            <label for="restockingDate">Restocking Date: <span>*</span></label>
            <input type="date" id="restockingDate" name="restockingDate" required><br>

            <div class="box">
                <p>Product Image <span>*</span></p>
                <input type="file" name="image_01" class="input" accept="image/*" required>
            </div>

            <input type="submit" value="Add Product" name="post">
        </form>
    </div>
    
</body>
</html>

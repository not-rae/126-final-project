<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HONESTORE: MENU</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    main {
        display: flex;
        flex-direction: column;
        height: 100vh;
        width: 68.3rem;
    }
    .dashboard {
        border-bottom: none;
    }
    
    #showQRCodeButton {
        background-color: transparent;
        color: #000000;
        font-weight: bold;
    }
    /* Popup container */
    .popup {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    /* Popup content */
    .popup-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px;
        text-align: center;
        border-radius: 25px;
    }

    /* Close button */
    .close {
        color: #ffffff;
        background-color: #009900;
        border-radius: 50px;
        font-size: 25px;
        font-weight: bold;
        width: 60%;
        display: block;
        margin: 0 auto;
    }

    .close:hover,
    .close:focus {
        color: #ffffff;
        background-color: #008000;
        text-decoration: none;
        cursor: pointer;
    }
    
</style>
<body>
    <header>
        <div class="back-button">
            <span class='bx bx-left-arrow-circle'></span>
        </div>    
        <div class="separator"></div>
        <div class="Logo">
            <img src="./dutchmill.jpg" alt="Logo">
        </div>
        <div class="titles">
            <h1 class="menu">MENU</h1>
            <h1 class="honestore">HONESTORE</h1>
        </div>
        <div class="time-container">
            <div class="time" id="currentDateTime"></div>
        </div>
    </header>

    <div class="category-container">
        <aside>
            <ul>
                <li><a href="#" data-category="Coffee"><img src="./icons/coffee_icon.png" alt="Coffee"> Coffee</a></li>
                <li><a href="#" data-category="Beverages"><img src="./icons/beverages_icon.png" alt="Beverages"> Beverages</a></li>
                <li><a href="#" data-category="Snack"><img src="./icons/snakc_icon.png" alt="Snack"> Snack</a></li>
                <li><a href="#" data-category="Noodles"><img src="./icons/noodles_icon.png" alt="Noodles"> Noodles</a></li>
                <li><a href="#" data-category="School Supplies"><img src="./icons/schoolSupplies_icon.png" alt="School Supplies">School<br>Supplies</a></li>
                <li><a href="#" data-category="Toiletries"><img src="./icons/toiletriesLaundry_icon.png" alt="Toiletries"> Toiletries <br>& Laundry</a></li>
                <li><a href="#" data-category="Others"><img src="./icons/others.png" alt="Others">Others</a></li>

            </ul>
        </aside>
    </div>

        <main>
            <div class="dashboard">
                <h2>Dashboard</h2>
            </div>
            <div class="product-list">
                <?php
                include 'DBconnector.php';

                $sql = "SELECT * FROM inventory";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product" data-category="' . htmlspecialchars($row["category"]) . '">';
                        echo '<img src="' . htmlspecialchars($row["image_path"]) . '" alt="' . htmlspecialchars($row["item_name"]) . '" class="product-img">';
                        echo '<h3 class="product-title">' . htmlspecialchars($row["item_name"]) . '</h3>';
                        echo '<span class="price">₱ ' . htmlspecialchars(number_format($row["price"], 2)) . '</span>';
                        echo '<p class="quantity">Quantity: ' . htmlspecialchars($row["quantity"]) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </main>
        <div class="category-container">
        <div class="right-panel">
            <div class="customer-info">
                <div class="orderID">Order ID</div>
                <h3>Customer Information</h3>   
                <input type="text" id="customer-name" name="customer-name" placeholder="Customer name">
            </div>
            <div class="order-details">
                <hr>
                <h3>Order details</h3>
                <div class="order-content">
                    <div class="order-box">
                        <img src="./beverages/dutchmill.jpg" alt="" class="order-img">
                        <div class="detail-box">
                            <div class="order-product-title"> Dutch Mill</div>
                            <div class="order-price">₱ 10.00</div>
                        <div class="quantity-container">
                            <button type="button" class="btn-decrement">-</button>
                            <input type="text" value="1" class="order-quantity">
                            <button type="button" class="btn-increment">+</button>
                        </div>
                            
                        </div> 
                        <i class='bx bxs-trash order-remove'></i>
                    </div>
                </div>

                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total:</div>
                    <div class="total-price">₱ 0.00</div>
                </div>
            </div>

            <!-- Payment Option -->
            <h3>Payment Option</h3>
            <div class="payment-option-container">
                <div class="payment-option">
                    <button id="cash-payment">Cash</button>
                    <button id="gcash-payment">GCash</button>
                </div>
            </div>
            <div class="cash-details">
                <input type="number" class="cash-payment" id="cashPaymentInput" placeholder="Input payment">
                <div class="change">
                    <div class="change-title">Change:</div>
                    <div class="change-price" id="changeAmount">P0.00</div>
                </div>
                <button type="button" class="btn-buy" id="payNowButton">Pay Now</button>
            </div>

            <div class="gcash-details">
                <button id="showQRCodeButton">Show QR Code</button>
                <input type="text" class="referenceNo" placeholder="Reference No.">
                <button type="button" class="btn-buy">Pay Now</button>
            </div>
            <div id="qrCodePopup" class="popup">
                <div class="popup-content">
                    <h2>QR Code</h2>
                    <hr style="max-width: 100%; border: 2px solid #000;">
                    <img src="qr-code.png" alt="QR Code" style="max-width: 100%; height: auto;">
                    <button class="close">Done</button>
                </div>
            </div>
            <script>
                    // Function to toggle the display of the popup
                    function togglePopup() {
                        var popup = document.getElementById("qrCodePopup");
                        popup.style.display = (popup.style.display === "block") ? "none" : "block";
                    }

                    // Add event listener to the "Show QR Code" button
                    document.getElementById("showQRCodeButton").addEventListener("click", function() {
                        togglePopup();
                    });

                    // Add event listener to the close button of the popup to close it
                    document.querySelector(".popup-content .close").addEventListener("click", function() {
                        togglePopup();
                    });
                </script>
        </div>
        </div>
    <script src="script.js"></script>
</body>
</html>

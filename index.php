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
        width: 69rem;
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
            <a href="home.html"><span class='bx bx-left-arrow-circle'></span></a>
        </div>    
        <div class="separator"></div>
        <div class="Logo">
            <img src="logo2.png" alt="Logo">
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
                    echo '<div class="product" data-category="' . htmlspecialchars($row["category"]) . '" data-name="' . htmlspecialchars($row["item_name"]) . '" data-price="' . htmlspecialchars($row["price"]) . '">';
                    // Constructing the image URL by combining the base URL of your images folder with the image file name
                    $imageURL = 'uploaded_files/' . htmlspecialchars($row["image_path"]);
                    echo '<img src="' . $imageURL . '" alt="' . htmlspecialchars($row["item_name"]) . '" class="product-img">';
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
        <!-- <div class="orderID">Order ID</div> -->
        <h3>Customer Information</h3>
        <form id="orderForm" method="POST" action="submit_order.php">
            <input type="text" id="customer-name" name="customer_name" placeholder="Customer name" required>

            <div class="order-details">
                <hr>
                <h3>Order details</h3>
                <div class="order-content">
                    <div class="order-box">
                    </div>
                </div>

                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total:</div>
                    <div class="total-price">₱ 0.00</div>
                    <input type="hidden" name="purchase_total">
                </div>
            </div>

            <!-- Payment Option -->
            <h3>Payment Option</h3>
            <div class="payment-option-container">
            <div class="payment-option">
                <div>
                    <input type="radio" id="cash-payment" name="payment_method" value="cash" required> 
                    <label for="cash-payment">Cash</label>
                </div>
                <div>
                    <input type="radio" id="gcash-payment" name="payment_method" value="gcash" required> 
                    <label for="gcash-payment">GCash</label>
                </div>
            </div>
            </div>
            <div class="cash-details">
                <input type="number" class="cash-payment" id="cashPaymentInput" name="cash_purchase" placeholder="Input payment">
                <div class="change">
                    <div class="change-title">Change:</div>
                    <div class="change-price" id="changeAmount">P0.00</div>
                    <input type="hidden" name="purchase_change" value="0.00">
                </div>
            </div>
            <div class="gcash-details">
                <button id="showQRCodeButton">Show QR Code</button>
                <input type="text" class="referenceNo" name="gcash_purchase" placeholder="Reference No.">
            </div>
            <button type="submit" class="btn-buy">Pay Now</button>
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
        </form>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const cashButton = document.getElementById("cash-payment");
        const gcashButton = document.getElementById("gcash-payment");
        const cashDetails = document.querySelector(".cash-details");
        const gcashDetails = document.querySelector(".gcash-details");
        const categoryLinks = document.querySelectorAll('aside ul li a');
        const products = document.querySelectorAll('.product');
        const aside = document.querySelector('aside');
        const buttons = document.querySelectorAll('.payment-option button');
        const menuToggle = document.getElementById('menu-toggle');
    
        // Initialize an empty array to store selected products
        let selectedProducts = [];

        // Add event listeners to product items
        products.forEach(product => {
            product.addEventListener('click', function() {
                const productName = product.getAttribute('data-name');
                const productPrice = parseFloat(product.getAttribute('data-price'));
                // Add selected product to the array
                selectedProducts.push({ name: productName, price: productPrice });
                // Update order details
                updateOrderDetails();
            });
        });
            
                // Function to update order details
                function updateOrderDetails() {
                const orderContent = document.querySelector('.order-content');
                const totalPriceElement = document.querySelector('.total-price');
                const hiddenTotalInput = document.querySelector('input[name="purchase_total"]');

                // Clear existing order content
                orderContent.innerHTML = '';

                // Loop through selected products and add them to order details
                let totalPrice = 0;
                selectedProducts.forEach((product, index) => {
                    totalPrice += product.price;
                    orderContent.innerHTML += `
                        <div class="order-box" data-index="${index}">
                            <img src="${product.imageURL}" alt="${product.name}" class="order-product-image">
                            <div class="order-product-title">${product.name}</div>
                            <div class="order-price">₱ ${product.price.toFixed(2)}</div>
                            <div class="quantity-container">
                                <button type="button" class="btn-decrement">-</button>
                                <input type="text" name="order_quantity" value="1" class="order-quantity" required>
                                <button type="button" class="btn-increment">+</button>
                            </div>
                            <i class='bx bxs-trash btn-remove'></i>
                        </div>
                    `;
                });

                // Update total price
                totalPriceElement.textContent = `₱ ${totalPrice.toFixed(2)}`;
                hiddenTotalInput.value = totalPrice.toFixed(2);

                // Add event listeners to increment and decrement buttons
                const decrementButtons = document.querySelectorAll('.btn-decrement');
                const incrementButtons = document.querySelectorAll('.btn-increment');
                const removeButtons = document.querySelectorAll('.btn-remove');

                decrementButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const quantityInput = this.nextElementSibling;
                        let quantity = parseInt(quantityInput.value) - 1;
                        quantity = Math.max(1, quantity);
                        quantityInput.value = quantity;
                        updateTotalPrice();
                    });
                });

                incrementButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const quantityInput = this.previousElementSibling;
                        let quantity = parseInt(quantityInput.value) + 1;
                        quantityInput.value = quantity;
                        updateTotalPrice();
                    });
                });

                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.parentElement.getAttribute('data-index'));
                        selectedProducts.splice(index, 1);
                        updateOrderDetails();
                    });
                });
            }

            // Function to update total price based on quantity changes
            function updateTotalPrice() {
                let totalPrice = 0;
                const orderBoxes = document.querySelectorAll('.order-box');
                orderBoxes.forEach(orderBox => {
                    const price = parseFloat(orderBox.querySelector('.order-price').textContent.replace('₱ ', ''));
                    const quantity = parseInt(orderBox.querySelector('.order-quantity').value);
                    totalPrice += price * quantity;
                });
                const totalPriceElement = document.querySelector('.total-price');
                const hiddenTotalInput = document.querySelector('input[name="purchase_total"]');
                totalPriceElement.textContent = `₱ ${totalPrice.toFixed(2)}`;
                hiddenTotalInput.value = totalPrice.toFixed(2);
            }


        // Function to update the time
        function updateTime() {
            const dateTimeElement = document.getElementById('currentDateTime');
            const currentDate = new Date();
            const options = { hour: 'numeric', minute: 'numeric', second: 'numeric', month: '2-digit', day: '2-digit', year: 'numeric' };
            const formattedDate = currentDate.toLocaleDateString('en-US', options);
            dateTimeElement.textContent = formattedDate;
        }

        // Initially hide both payment option details
        cashDetails.style.display = "none";
        gcashDetails.style.display = "none";

        // Function to reset button colors
        function resetButtonColors() {
            buttons.forEach(btn => btn.style.backgroundColor = "#DDB892");
        }

        // Add click event listeners to the cash and GCash buttons
        cashButton.addEventListener("click", function() {
            cashDetails.style.display = "block";
            gcashDetails.style.display = "none";
            resetButtonColors();
            cashButton.style.backgroundColor = "white"; // Set cash button color to white
        });

        gcashButton.addEventListener("click", function() {
            cashDetails.style.display = "none";
            gcashDetails.style.display = "block";
            resetButtonColors();
            gcashButton.style.backgroundColor = "white"; // Set GCash button color to white
        });

        // call the updateTime function
        updateTime();

        // update the time every second
        setInterval(updateTime, 1000);

        menuToggle.addEventListener('click', () => {
            aside.classList.toggle('active');
        });

        // payment buttons
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                resetButtonColors(); // Reset all button colors
                this.style.backgroundColor = "white"; // Set clicked button color to white
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('aside ul li a');
    const products = document.querySelectorAll('.product');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const category = this.getAttribute('data-category');

            categoryLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            products.forEach(product => {
                const productCategory = product.getAttribute('data-category');
                if (category === 'All' || productCategory === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });
});

    </script>
</body>
</html>
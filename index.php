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
        <form id="orderForm" method="POST" action="submit_order.php">
            <input type="text" id="customer-name" name="customer_name" placeholder="Customer name" required>

            <div class="order-details">
                <hr>
                <h3>Order details</h3>
                <div class="order-content">
                    <div class="order-box">
                        <img src="./beverages/dutchmill.jpg" alt="" class="order-img">
                        <div class="detail-box">
                            <div class="order-product-title">Dutch Mill</div>
                            <div class="order-price">₱ 10.00</div>
                            <div class="quantity-container">
                                <button type="button" class="btn-decrement">-</button>
                                <input type="text" name="order_quantity" value="1" class="order-quantity" required>
                                <button type="button" class="btn-increment">+</button>
                            </div>
                        </div>
                        <i class='bx bxs-trash order-remove'></i>
                    </div>
                </div>

                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total:</div>
                    <div class="total-price">₱ 10.00</div>
                    <input type="hidden" name="purchase_total">
                </div>
            </div>

            <!-- Payment Option -->
            <h3>Payment Option</h3>
            <div class="payment-option-container">
                <div class="payment-option">
                    <input type="radio" id="cash-payment" name="payment_method" value="cash" required> Cash
                    <input type="radio" id="gcash-payment" name="payment_method" value="gcash" required> GCash
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
                <input type="text" class="referenceNo" name="gcash_purchase" placeholder="Reference No.">
            </div>
            <button type="submit" class="btn-buy">Pay Now</button>
        </form>
    </div>
</div>
    <script>document.addEventListener('DOMContentLoaded', function() {
    const cashButton = document.getElementById("cash-payment");
    const gcashButton = document.getElementById("gcash-payment");
    const cashDetails = document.querySelector(".cash-details");
    const gcashDetails = document.querySelector(".gcash-details");
    const categoryLinks = document.querySelectorAll('aside ul li a');
    const products = document.querySelectorAll('.product');
    const aside = document.querySelector('aside');
    const buttons = document.querySelectorAll('.payment-option button');
    const menuToggle = document.getElementById('menu-toggle');

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

    // category buttons
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const category = this.getAttribute('data-category');

            categoryLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            // Filter products based on category
            products.forEach(product => {
                if (category === 'All' || product.getAttribute('data-category') === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });

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


document.addEventListener('DOMContentLoaded', function () {
    const decrementButtons = document.querySelectorAll('.btn-decrement');
    const incrementButtons = document.querySelectorAll('.btn-increment');
    const orderQuantityInputs = document.querySelectorAll('.order-quantity');
    const totalElement = document.querySelector('.total-price');
    const cashPaymentInput = document.getElementById('cashPaymentInput');
    const changeAmountElement = document.getElementById('changeAmount');
    const payNowButton = document.getElementById('payNowButton');
    const productList = document.querySelector('.product-list');
    const orderContent = document.querySelector('.order-content');

    // Function to handle decrement button click
    function handleDecrementClick(event) {
        const input = event.target.nextElementSibling;
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = --value;
            computeTotalPrice();
        }
    }

    // Function to handle increment button click
    function handleIncrementClick(event) {
        const input = event.target.previousElementSibling;
        let value = parseInt(input.value);
        input.value = ++value;
        computeTotalPrice();
    }

    // Function to handle input value change
    function handleInputChange(event) {
        const input = event.target;
        let value = parseInt(input.value);
        if (isNaN(value) || value < 1) {
            input.value = 1;
        }
        computeTotalPrice();
    }

    // Function to compute total price
    function computeTotalPrice() {
        let totalPrice = 0;
        const orderItems = document.querySelectorAll('.order-box');

        orderItems.forEach(item => {
            const quantity = parseInt(item.querySelector('.order-quantity').value);
            const price = parseFloat(item.querySelector('.order-price').innerText.replace('₱ ', ''));
            totalPrice += quantity * price;
        });

        totalElement.innerText = '₱ ' + totalPrice.toFixed(2);
    }

    // Function to compute change
    function computeChange() {
        const totalPrice = parseFloat(totalElement.innerText.replace('₱ ', ''));
        const cashPayment = parseFloat(cashPaymentInput.value);

        if (!isNaN(cashPayment) && cashPayment >= totalPrice) {
            const change = cashPayment - totalPrice;
            changeAmountElement.innerText = '₱ ' + change.toFixed(2);
        } else {
            changeAmountElement.innerText = '₱ 0.00';
        }
    }

    // Function to handle product click
    function handleProductClick(event) {
        const product = event.currentTarget;
        const productImg = product.querySelector('.product-img').src;
        const productTitle = product.querySelector('.product-title').innerText;
        const productPrice = product.querySelector('.price').innerText.replace('₱ ', '');

        addProductToOrder(productImg, productTitle, productPrice);
        computeTotalPrice();
    }

    // Function to add product to order
    function addProductToOrder(imgSrc, title, price) {
        const orderBox = document.createElement('div');
        orderBox.classList.add('order-box');

        orderBox.innerHTML = `
            <img src="${imgSrc}" alt="${title}" class="order-img">
            <div class="detail-box">
                <div class="order-product-title">${title}</div>
                <div class="order-price">₱ ${price}</div>
                <div class="quantity-container">
                    <button type="button" class="btn-decrement">-</button>
                    <input type="text" value="1" class="order-quantity">
                    <button type="button" class="btn-increment">+</button>
                </div>
            </div>
            <i class='bx bxs-trash order-remove'></i>
        `;

        orderContent.appendChild(orderBox);

        // Add event listeners to the new quantity buttons
        orderBox.querySelector('.btn-decrement').addEventListener('click', handleDecrementClick);
        orderBox.querySelector('.btn-increment').addEventListener('click', handleIncrementClick);
        orderBox.querySelector('.order-quantity').addEventListener('input', handleInputChange);
        orderBox.querySelector('.order-remove').addEventListener('click', handleRemoveClick);
    }

    // Function to handle removing an order item
    function handleRemoveClick(event) {
        const orderBox = event.currentTarget.closest('.order-box');
        orderBox.remove();
        computeTotalPrice();
    }

    // Add event listeners to existing decrement buttons
    decrementButtons.forEach(button => {
        button.addEventListener('click', handleDecrementClick);
    });

    // Add event listeners to existing increment buttons
    incrementButtons.forEach(button => {
        button.addEventListener('click', handleIncrementClick);
    });

    // Add event listeners to existing quantity inputs
    orderQuantityInputs.forEach(input => {
        input.addEventListener('input', handleInputChange);
    });

    // Add event listener to cash payment input
    cashPaymentInput.addEventListener('input', computeChange);

    // Add event listener to pay now button
    payNowButton.addEventListener('click', computeChange);

    // Add event listener to product list
    productList.querySelectorAll('.product').forEach(product => {
        product.addEventListener('click', handleProductClick);
    });

    // Add event listeners to existing trash icons
    document.querySelectorAll('.order-remove').forEach(icon => {
        icon.addEventListener('click', handleRemoveClick);
    });

    // Compute total price initially
    computeTotalPrice();
});
</script>
</body>
</html>

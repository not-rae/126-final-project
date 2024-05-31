
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
    const orderQuantityInputs = document.querySelectorAll('.order_quantity');
    const totalElement = document.querySelector('.total-price');
    const cashPaymentInput = document.getElementById('cashPaymentInput');
    const changeAmountElement = document.getElementById('changeAmount');
    const payNowButtonCASH = document.getElementById('payNowButtonCASH');
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
            const quantity = parseInt(item.querySelector('.order_quantity').value);
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
                    <input type="text" value="1" class="order_quantity">
                    <button type="button" class="btn-increment">+</button>
                </div>
            </div>
            <i class='bx bxs-trash order-remove'></i>
        `;

        orderContent.appendChild(orderBox);

        // Add event listeners to the new quantity buttons
        orderBox.querySelector('.btn-decrement').addEventListener('click', handleDecrementClick);
        orderBox.querySelector('.btn-increment').addEventListener('click', handleIncrementClick);
        orderBox.querySelector('.order_quantity').addEventListener('input', handleInputChange);
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
    payNowButtonCASH.addEventListener('click', computeChange);

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

document.getElementById('showQRCodeButton').onclick = function() {
    document.getElementById('qrCodePanel').style.display = "block";
};

document.getElementsByClassName('close')[0].onclick = function() {
    document.getElementById('qrCodePanel').style.display = "none";
};

window.onclick = function(event) {
    if (event.target == document.getElementById('qrCodePanel')) {
        document.getElementById('qrCodePanel').style.display = "none";
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const payNowButtonCASH = document.getElementById('payNowButtonCASH');
    const payNowButtonGCASH = document.getElementById('payNowButtonGCASH');
    const quantitySpan = document.getElementById('productQuantity');
    const orderQuantityInput = document.getElementById('orderQuantity');
    
    payNowButtonCASH.addEventListener('click', () => {
        let currentQuantity = parseInt(quantitySpan.textContent);
        let orderQuantity = parseInt(orderQuantityInput.value);

        if (isNaN(orderQuantity) || orderQuantity <= 0) {
            alert('Please enter a valid order quantity.');
            return;
        }
        
        if (orderQuantity > currentQuantity) {
            alert('Sorry, the requested quantity is not available.');
        } else {
            currentQuantity -= orderQuantity;
            quantitySpan.textContent = currentQuantity;
        }
    });

    payNowButtonGCASH.addEventListener('click', () => {
        let currentQuantity = parseInt(quantitySpan.textContent);
        let orderQuantity = parseInt(orderQuantityInput.value);

        if (isNaN(orderQuantity) || orderQuantity <= 0) {
            alert('Please enter a valid order quantity.');
            return;
        }
        
        if (orderQuantity > currentQuantity) {
            alert('Sorry, the requested quantity is not available.');
        } else {
            currentQuantity -= orderQuantity;
            quantitySpan.textContent = currentQuantity;
        }
    });
});
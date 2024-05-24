document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('aside ul li a');
    const products = document.querySelectorAll('.product');
    const aside = document.querySelector('aside');
    const buttons = document.querySelectorAll('.payment-option button');

    // Function to update the time
    function updateTime() {
        const dateTimeElement = document.getElementById('currentDateTime');
        const currentDate = new Date();
        const options = { hour: 'numeric', minute: 'numeric', second: 'numeric', month: '2-digit', day: '2-digit', year: 'numeric' };
        const formattedDate = currentDate.toLocaleDateString('en-US', options);
        dateTimeElement.textContent = formattedDate;
    }

    // Call the updateTime function
    updateTime();

    // Update the time every second
    setInterval(updateTime, 1000);

    // Category buttons
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

    // Toggle menu
    const menuToggle = document.getElementById('menuToggle'); // Ensure you have an element with this ID
    menuToggle.addEventListener('click', () => {
        aside.classList.toggle('active');
    });

    // Payment buttons
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.style.backgroundColor = "#DDB892");
            this.style.backgroundColor = "white";
        });
    });

    //Remove items
    var removeOrderButtons = document.getElementsByClassName('order-remove');
    for (var i = 0; i < removeOrderButtons.length; i++) {
        var button = removeOrderButtons[i];
        button.addEventListener('click', removeOrderItem);
    }

    // Quantity changes
    var quantityInputs = document.getElementsByClassName('order-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    // Remove items
    function removeOrderItem(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.remove();
        updateTotal();
    }

    // Quantity change
    function quantityChanged(event) {
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updateTotal();
    }

    // Update total
    function updateTotal() {
        var orderContent = document.getElementsByClassName('order-content')[0];
        var orderBoxes = orderContent.getElementsByClassName('order-box');
        var total = 0;
        for (var i = 0; i < orderBoxes.length; i++) {
            var orderBox = orderBoxes[i];
            var priceElement = orderBox.getElementsByClassName('order-price')[0];
            var quantityElement = orderBox.getElementsByClassName('order-quantity')[0];
            var price = parseFloat(priceElement.innerText.replace("₱", ""));
            var quantity = quantityElement.value;
            total = total + (price * quantity);
        }
        document.getElementsByClassName("total-price")[0].innerText = "₱" + total;
    }
});

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    // Placeholder function for additional initialization
}

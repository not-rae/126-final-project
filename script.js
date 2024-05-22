document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('aside ul li a');
    const products = document.querySelectorAll('.product');
    const menuToggle = document.querySelector('.menu-toggle');
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

    // Call the updateTime function initially
    updateTime();

    // Update the time every second
    setInterval(updateTime, 1000);

    // Add event listeners for category links
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const category = this.getAttribute('data-category');

            // Remove active class from all links
            categoryLinks.forEach(link => link.classList.remove('active'));

            // Add active class to the clicked link
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

    // Add event listener for menu toggle
    menuToggle.addEventListener('click', () => {
        aside.classList.toggle('active');
    });

    // Add event listeners for payment buttons
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.style.backgroundColor = "#DDB892");
            this.style.backgroundColor = "white";
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const categoryLinks = document.querySelectorAll('aside ul li a');
    const products = document.querySelectorAll('.product');
    const menuToggle = document.querySelector('.menu-toggle');
    const aside = document.querySelector('aside');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const category = this.getAttribute('data-category');

            // Remove active class from all links
            categoryLinks.forEach(link => link.classList.remove('active'));

            // Add active class to the clicked link
            this.classList.add('active');

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
});

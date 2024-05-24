document.addEventListener('DOMContentLoaded', function () {
    const decrementButtons = document.querySelectorAll('.btn-decrement');
    const incrementButtons = document.querySelectorAll('.btn-increment');
    const orderQuantityInputs = document.querySelectorAll('.order-quantity');

    // Function to handle decrement button click
    function handleDecrementClick(event) {
        const input = event.target.nextElementSibling;
        let value = parseInt(input.value);
        if (value > 1) {
            input.value = --value;
        }
    }

    // Function to handle increment button click
    function handleIncrementClick(event) {
        const input = event.target.previousElementSibling;
        let value = parseInt(input.value);
        input.value = ++value;
    }

    // Function to handle input value change
    function handleInputChange(event) {
        const input = event.target;
        let value = parseInt(input.value);
        if (isNaN(value) || value < 1) {
            input.value = 1;
        }
    }

    // Add event listeners to decrement buttons
    decrementButtons.forEach(button => {
        button.addEventListener('click', handleDecrementClick);
    });

    // Add event listeners to increment buttons
    incrementButtons.forEach(button => {
        button.addEventListener('click', handleIncrementClick);
    });

    // Add event listeners to quantity inputs
    orderQuantityInputs.forEach(input => {
        input.addEventListener('input', handleInputChange);
    });
});

// my-add-to-cart-widget.js

document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.my-add-to-cart-button');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const productId = this.dataset.productId;
            const quantity = this.dataset.quantity || 1;

            fetch('/wp-json/wc/v3/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': myAddToCartWidget.nonce
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added to cart successfully!');
                } else {
                    alert('Failed to add product to cart.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    });
});
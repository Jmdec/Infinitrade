<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="Userside/lib/easing/easing.min.js"></script>
<script src="Userside/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="Userside/mail/jqBootstrapValidation.min.js"></script>
<script src="Userside/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="Userside/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Add to Cart Functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = this.dataset.productPrice;

            addToCart(productId, productName, productPrice);
        });
    });

    function addToCart(productId, productName, productPrice) {
        // Assuming you have a session storage to keep cart items
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

        // Check if product already exists in cart
        const existingProductIndex = cart.findIndex(item => item.id === productId);

        if (existingProductIndex > -1) {
            // If exists, increase quantity
            cart[existingProductIndex].quantity += 1;
        } else {
            // If not, add new product
            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                quantity: 1
            });
        }

        // Save updated cart to session storage
        sessionStorage.setItem('cart', JSON.stringify(cart));
        alert(`${productName} has been added to the cart!`);
    }

    // Filtering Function
    function filterProducts() {
        const searchInput = document.getElementById('search-input').value.toLowerCase();
        const priceFilters = [
            document.getElementById('price-1-1000').checked,
            document.getElementById('price-1001-3000').checked,
            document.getElementById('price-3001-5000').checked,
            document.getElementById('price-5001-above').checked,
        ];

        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            const productName = product.querySelector('.product-title').innerText.toLowerCase();
            const productPrice = parseFloat(product.dataset.price);
            const matchesSearch = productName.includes(searchInput);
            const matchesPriceFilter = (
                (priceFilters[0]) ||
                (priceFilters[1] && productPrice <= 1000) ||
                (priceFilters[2] && productPrice > 1000 && productPrice <= 3000) ||
                (priceFilters[3] && productPrice > 3000)
            );

            if (matchesSearch && matchesPriceFilter) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#productTable').DataTable({
            dom: 'Bfrtip',  // Positioning of the buttons
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Export to CSV',
                    title: 'Products'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: 'Products'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    title: 'Products'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    title: 'Products'
                }
            ]
        });
    });
</script>
<script>
    function adjustQuantity(button, change) {
        const input = button.closest('form').querySelector('input[name="quantity"]');
        let currentValue = parseInt(input.value) || 0;
        const newValue = Math.max(1, currentValue + change); // Ensure minimum value of 1
        input.value = newValue;
    }
</script>
<script>
    document.getElementById('payment-method').addEventListener('change', function () {
        const cardDetails = document.getElementById('card-details');
        const screenshotUpload = document.getElementById('screenshot-upload');
        const paymayaGcashInfo = document.getElementById('paymaya-gcash-info');
        if (this.value === 'card') {
            cardDetails.classList.remove('d-none');
            screenshotUpload.classList.add('d-none');
            paymayaGcashInfo.classList.add('d-none');
        } else if (this.value === 'gcash' || this.value === 'paymaya') {
            cardDetails.classList.add('d-none');
            screenshotUpload.classList.remove('d-none');
            paymayaGcashInfo.classList.remove('d-none');
        }
    });

    document.getElementById('place-order').addEventListener('click', function (event) {
        event.preventDefault();
        // Add your payment processing logic here using PayMongo
        const form = document.getElementById('payment-form');
        const formData = new FormData(form);
        // Implement PayMongo payment logic
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                // Sort countries alphabetically by common name
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                const countrySelect = document.getElementById('country-select');
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.cca2; // Use country code (e.g., US for United States)
                    option.textContent = country.name.common; // Display country name
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Show SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Added to Cart!',
                    text: 'Your item has been added to the cart.',
                    showConfirmButton: false,
                    timer: 1500 // Dismiss after 1.5 seconds
                }).then(() => {
                    // Submit the form after the alert
                    this.submit();
                });
            });
        });
    });
</script>
<script>
    function filterProducts() {
        const input = document.getElementById('search-input');
        const filter = input.value.toLowerCase();
        const productList = document.getElementById('productList');
        const products = productList.getElementsByClassName('product-item');

        // Get selected price filters
        const priceFilters = {
            'all': document.getElementById('price-all').checked,
            '1-1000': document.getElementById('price-1-1000').checked,
            '1001-3000': document.getElementById('price-1001-3000').checked,
            '3001-5000': document.getElementById('price-3001-5000').checked,
        };

        for (let i = 0; i < products.length; i++) {
            const title = products[i].getElementsByClassName('product-title')[0].innerText;
            const price = parseFloat(products[i].getAttribute('data-price'));
            let showProduct = true;

            // Check search filter
            if (!title.toLowerCase().includes(filter)) {
                showProduct = false;
            }

            // Check price filters
            if (!priceFilters.all) {
                if (priceFilters['1-1000'] && price <= 1000) {
                    showProduct = showProduct && true;
                } else if (priceFilters['1001-3000'] && price > 1000 && price <= 3000) {
                    showProduct = showProduct && true;
                } else if (priceFilters['3001-5000'] && price > 3000 && price <= 5000) {
                    showProduct = showProduct && true;
                } else {
                    showProduct = false;
                }
            }

            products[i].style.display = showProduct ? '' : 'none';
        }
    }
</script>

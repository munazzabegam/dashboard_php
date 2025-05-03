<?php
session_start();
include 'components/header.php';

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");  
//     exit();
// }

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<div class="container py-5">
    <h2 class="mb-4">Your Cart</h2>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="cart-items">
                        <!-- Cart items will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span id="subtotal">₹0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax (5%):</span>
                        <span id="tax">₹0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total:</span>
                        <span id="total" class="fw-bold">₹0.00</span>
                    </div>
                    <button class="btn btn-primary w-100" onclick="proceedToCheckout()">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadCart();
});

function loadCart() {
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById('cart-items');
    let subtotal = 0;
    
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p class="text-center">Your cart is empty</p>';
        updateTotals(0);
        return;
    }
    
    let html = '';
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;
        
        html += `
            <div class="cart-item mb-3 p-3 border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="${item.image}" class="img-fluid" alt="${item.name}">
                    </div>
                    <div class="col-md-4">
                        <h6>${item.name}</h6>
                        <p class="text-muted mb-0">₹${item.price}</p>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <input type="number" class="form-control text-center" value="${item.quantity}" min="1" 
                                   onchange="updateQuantityInput(${item.id}, this.value)">
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <span class="fw-bold">₹${itemTotal.toFixed(2)}</span>
                    </div>
                    <div class="col-md-1 text-end">
                        <button class="btn btn-danger btn-sm" onclick="removeItem(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });
    
    cartItemsContainer.innerHTML = html;
    updateTotals(subtotal);
}

function updateQuantity(itemId, change) {
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    const item = cart.find(item => item.id == itemId);
    
    if (item) {
        item.quantity += change;
        if (item.quantity < 1) item.quantity = 1;
        sessionStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }
}

function updateQuantityInput(itemId, newQuantity) {
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    const item = cart.find(item => item.id == itemId);
    
    if (item) {
        item.quantity = Math.max(1, parseInt(newQuantity));
        sessionStorage.setItem('cart', JSON.stringify(cart));
        loadCart();
    }
}

function removeItem(itemId) {
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    const newCart = cart.filter(item => item.id != itemId);
    sessionStorage.setItem('cart', JSON.stringify(newCart));
    loadCart();
    
    // Update cart count in header
    const cartCount = document.querySelector('.cart-count');
    if (cartCount) {
        const totalItems = newCart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
    }
}

function updateTotals(subtotal) {
    const tax = subtotal * 0.05;
    const total = subtotal + tax;
    
    document.getElementById('subtotal').textContent = `₹${subtotal.toFixed(2)}`;
    document.getElementById('tax').textContent = `₹${tax.toFixed(2)}`;
    document.getElementById('total').textContent = `₹${total.toFixed(2)}`;
}

function proceedToCheckout() {
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }
    
    // Redirect to checkout page
    window.location.href = 'checkout.php';
}
</script>

<?php
// Close the database connection
$conn->close();
?>

<?php include 'components/footer.php'; ?>

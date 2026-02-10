<?php
require_once 'config.php';
$pageTitle = "Cart - Burger Junction";
include 'header.php';
?>

<style>
    .cart-container {
        max-width: 1100px;
        margin: 3rem auto;
        padding: 0 1.5rem;
    }

    .cart-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .cart-header h1 {
        color: #c82333;
        font-size: 2.8rem;
        margin-bottom: 0.5rem;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .cart-table th {
        background: #0a0a0a;
        color: white;
        padding: 1.2rem 1rem;
        text-align: left;
        font-weight: 600;
    }

    .cart-table td {
        padding: 1.4rem 1rem;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .cart-table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8f9fa;
        border-radius: 8px;
        padding: 4px;
        width: fit-content;
    }

    .quantity-control button {
        width: 32px;
        height: 32px;
        border: none;
        background: #fff;
        border-radius: 6px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: 0.2s;
    }

    .quantity-control button:hover {
        background: #ffb703;
        color: white;
    }

    .remove-btn {
        background: #ff4757;
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        transition: 0.3s;
    }

    .remove-btn:hover {
        background: #ff3742;
        transform: scale(1.05);
    }

    .cart-total {
        background: white;
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-top: 2.5rem;
        text-align: right;
    }

    .cart-total h3 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    .total-amount {
        font-size: 2.2rem;
        font-weight: 800;
        color: #c82333;
    }

    .cart-actions {
        display: flex;
        gap: 1.5rem;
        margin-top: 2rem;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .btn {
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        cursor: pointer;
        border: none;
    }

    .btn-continue {
        background: #ddd;
        color: #333;
    }

    .btn-continue:hover {
        background: #ccc;
    }

    .btn-checkout {
        background: #c82333;
        color: white;
    }

    .btn-checkout:hover {
        background: #a51c2a;
        transform: translateY(-3px);
    }

    .empty-cart, .payment-section {
        text-align: center;
        padding: 4rem 1rem;
        color: #333;
    }

    .payment-section {
        background: white;
        border-radius: 16px;
        padding: 3rem 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: 2rem;
    }

    .payment-section img {
        max-width: 320px;
        margin: 1.5rem 0;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .payment-section h2 {
        color: #2e7d32;
        margin-bottom: 1rem;
        font-size: 2rem;
    }

    .payment-section p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: #555;
    }

    .back-btn {
        padding: 1rem 2rem;
        background: #ffb703;
        color: #000;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .back-btn:hover {
        background: #e0a800;
        transform: translateY(-3px);
    }
</style>

<div class="cart-container">
    <div class="cart-header">
        <h1>Your Cart</h1>
        <p id="cart-count-text">0 items</p>
    </div>

    <table class="cart-table" id="cart-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="cart-body"></tbody>
    </table>

    <!-- Empty Cart -->
    <div class="empty-cart" id="empty-cart" style="display:none;">
        <i class="fas fa-shopping-cart"></i>
        <h2>Your cart is empty</h2>
        <p>Looks like you haven't added anything yet.</p>
        <a href="menu.php" class="btn btn-continue">Browse Menu</a>
    </div>

    <!-- Cart Summary + Checkout Button -->
    <div class="cart-total" id="cart-total-section" style="display:none;">
        <h3>Total Amount</h3>
        <div class="total-amount">₹<span id="grand-total">0.00</span></div>
        
        <div class="cart-actions">
            <a href="menu.php" class="btn btn-continue">Continue Shopping</a>
            <button onclick="showPaymentBarcode()" class="btn btn-checkout">Proceed to Checkout</button>
        </div>
    </div>

    <!-- Barcode / Payment Confirmation Section -->
    <div class="payment-section" id="payment-section" style="display:none;">
        <i class="fas fa-qrcode" style="font-size:6rem; color:#2e7d32; margin-bottom:1rem;"></i>
        <h2>Payment at Counter</h2>
        <p>Please show this barcode to the staff at the counter to complete your payment.</p>
        
        <!-- Replace with your real barcode image -->
        <img src="Barcode.jpeg" alt="Payment Barcode" style="max-width:320px; margin:1.5rem 0;">
        
        <p style="font-size:1.2rem; margin:2rem 0;">
            <strong>Thank you for your order!</strong><br>
            Your food will be prepared shortly.
        </p>
        
        <button onclick="goBackToMenu()" class="back-btn">
            Back to Menu
        </button>
    </div>
</div>

<script>
// Render Cart
function renderCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const tbody = document.getElementById('cart-body');
    const emptyCart = document.getElementById('empty-cart');
    const totalSection = document.getElementById('cart-total-section');
    const grandTotalEl = document.getElementById('grand-total');
    const countText = document.getElementById('cart-count-text');

    tbody.innerHTML = '';

    if (cart.length === 0) {
        emptyCart.style.display = 'block';
        totalSection.style.display = 'none';
        countText.textContent = '0 items';
        return;
    }

    emptyCart.style.display = 'none';
    totalSection.style.display = 'block';

    let total = 0;

    cart.forEach((item, index) => {
        const subtotal = item.price * item.quantity;
        total += subtotal;

        tbody.innerHTML += `
            <tr>
                <td>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <img src="${item.image}" alt="${item.name}" style="width:70px; height:70px; object-fit:cover; border-radius:8px;">
                        <div class="item-name">${item.name}</div>
                    </div>
                </td>
                <td>₹${item.price.toFixed(2)}</td>
                <td>
                    <div class="quantity-control">
                        <button onclick="changeCartQty(${index}, -1)">−</button>
                        <span style="padding:0 12px; font-weight:600;">${item.quantity}</span>
                        <button onclick="changeCartQty(${index}, 1)">+</button>
                    </div>
                </td>
                <td><strong>₹${subtotal.toFixed(2)}</strong></td>
                <td>
                    <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
                </td>
            </tr>
        `;
    });

    grandTotalEl.textContent = total.toFixed(2);
    countText.textContent = `${cart.length} item${cart.length > 1 ? 's' : ''}`;
}

// Change quantity
function changeCartQty(index, delta) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart[index].quantity += delta;
    if (cart[index].quantity < 1) cart[index].quantity = 1;
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
    updateCartCount();
}

// Remove item
function removeFromCart(index) {
    if (!confirm("Remove this item from cart?")) return;
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
    updateCartCount();
}

// Show barcode payment screen
function showPaymentBarcode() {
    // Hide cart content
    document.getElementById('cart-table').style.display = 'none';
    document.getElementById('cart-total-section').style.display = 'none';

    // Show barcode section
    document.getElementById('payment-section').style.display = 'block';

    // Optional: Clear cart after showing barcode
    // localStorage.removeItem('cart');
    // updateCartCount();
}

// Back to menu
function goBackToMenu() {
    window.location.href = 'menu.php';
}

// Update header cart count
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const total = cart.reduce((sum, item) => sum + item.quantity, 0);
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.textContent = total;
        badge.style.display = total > 0 ? 'flex' : 'none';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    renderCart();
    updateCartCount();
});
</script>

<?php include 'footer.php'; ?>
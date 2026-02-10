<?php
require_once 'config.php';
session_start();
$pageTitle = "Checkout";

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: menu.php");
    exit;
}

$cart_items = [];
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {
    $stmt = $pdo->prepare("SELECT id, name, price FROM menu_items WHERE id = ? AND is_active = 1");
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $item['quantity'] = $qty;
        $item['subtotal'] = $item['price'] * $qty;
        $cart_items[] = $item;
        $total += $item['subtotal'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    if (empty($name) || empty($phone)) {
        $error = "Name and phone number are required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $error = "Invalid phone number.";
    } else {
        try {
            $pdo->beginTransaction();

            // Create order
            $stmt = $pdo->prepare("
                INSERT INTO orders (customer_name, phone, total_price, order_date, status) 
                VALUES (?, ?, ?, NOW(), 'pending')
            ");
            $stmt->execute([$name, $phone, $total]);
            $order_id = $pdo->lastInsertId();

            // Add order items
            $itemStmt = $pdo->prepare("
                INSERT INTO order_items (order_id, item_id, item_name, price, quantity) 
                VALUES (?, ?, ?, ?, ?)
            ");

            foreach ($cart_items as $item) {
                $itemStmt->execute([
                    $order_id,
                    $item['id'],
                    $item['name'],
                    $item['price'],
                    $item['quantity']
                ]);
            }

            $pdo->commit();
            unset($_SESSION['cart']);
            header("Location: success.php");
            exit;

        } catch (Exception $e) {
            $pdo->rollBack();
            $error = "Order could not be placed. Please try again.";
            // error_log($e->getMessage());
        }
    }
}

include 'header.php';
?>

<section class="checkout-section">
    <div class="container">
        <h1>Checkout</h1>

        <?php if (isset($error)): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div class="cart-summary">
            <h3>Your Order</h3>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td>₹<?= number_format($item['price'], 2) ?></td>
                            <td><?= $item['quantity'] ?></td>
                            <td>₹<?= number_format($item['subtotal'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total Amount</strong></td>
                        <td><strong>₹<?= number_format($total, 2) ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <form method="post" class="checkout-form">
            <h3>Delivery / Pickup Details</h3>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required placeholder="John Doe">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required placeholder="9876543210" pattern="[0-9]{10}" maxlength="10">
            </div>

            <button type="submit" class="btn-primary">Confirm & Place Order</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
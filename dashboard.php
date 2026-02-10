<?php
require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "My Dashboard";

// Protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch Recent Orders (last 5)
try {
    $orderStmt = $pdo->prepare("
        SELECT id, customer_name, phone, total_price, order_date, total_amount
        FROM orders
        ORDER BY order_date DESC
        LIMIT 5
    ");
    $orderStmt->execute();
    $recent_orders = $orderStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not fetch orders: " . $e->getMessage());
}

include 'header.php';
?>

<section class="dashboard-section">
    <div class="container">
        <h1>Welcome Back, <?= htmlspecialchars($_SESSION['full_name'] ?? 'User') ?>!</h1>
        <p class="lead">Here's an overview of your account</p>

        <div class="dashboard-grid">
            <!-- Quick Stats -->
            <div class="card stat-card">
                <h3>Quick Stats</h3>
                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-value"><?= count($recent_orders) ?></span>
                        <span class="stat-label">Recent Orders</span>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-header">
                    <h3>Recent Orders</h3>
                </div>
                <?php if (empty($recent_orders)): ?>
                    <p class="no-data">No recent orders found.</p>
                <?php else: ?>
                    <table class="recent-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Total Price</th>
                                <th>Order Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recent_orders as $order): ?>
                                <tr>
                                    <td>#<?= $order['id'] ?></td>
                                    <td><?= htmlspecialchars($order['customer_name']) ?></td>
                                    <td><?= htmlspecialchars($order['phone']) ?></td>
                                    <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                                    <td><?= date('d M Y', strtotime($order['order_date'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <div class="quick-actions">
            <a href="menu.php" class="btn-primary">Order Food</a>
            <a href="book_table.php" class="btn-secondary">Book a Table</a>
            <a href="profile.php" class="btn-outline">Update Profile</a>
        </div>
    </div>
</section>

<style>
/* ===================== Dashboard Styling ===================== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 0;
    color: #333;
}

.dashboard-section {
    padding: 2rem 1rem;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: #1a1a1a;
}

.lead {
    font-size: 1rem;
    color: #555;
    margin-bottom: 2rem;
}

.dashboard-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.card {
    background: #fff;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    flex: 1 1 100%;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.card-header h3 {
    margin: 0;
    font-size: 1.2rem;
}

.stat-card .stats {
    display: flex;
    gap: 2rem;
    padding-top: 1rem;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: #6366f1;
}

.stat-label {
    font-size: 0.9rem;
    color: #555;
}

.recent-table {
    width: 100%;
    border-collapse: collapse;
}

.recent-table th,
.recent-table td {
    padding: 0.8rem 1rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.recent-table th {
    background-color: #f0f0f0;
    font-weight: 600;
}

.no-data {
    padding: 1rem 0;
    color: #888;
    font-style: italic;
    text-align: center;
}

.quick-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn-primary,
.btn-secondary,
.btn-outline {
    padding: 0.8rem 1.2rem;
    border-radius: 8px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #6366f1;
    color: #fff;
}

.btn-primary:hover {
    background-color: #4f46e5;
}

.btn-secondary {
    background-color: #f59e0b;
    color: #fff;
}

.btn-secondary:hover {
    background-color: #d97706;
}

.btn-outline {
    border: 2px solid #6366f1;
    color: #6366f1;
}

.btn-outline:hover {
    background-color: #6366f1;
    color: #fff;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-grid {
        flex-direction: column;
    }

    .quick-actions {
        flex-direction: column;
    }
}
</style>

<?php include 'footer.php'; ?>

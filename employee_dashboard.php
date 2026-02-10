<?php
require_once 'config.php';
$pageTitle = "Employee Dashboard";

// Protect page - only employee can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    header("Location: login.php");
    exit;
}

$employee_id = $_SESSION['user_id'];

// Fetch assigned orders
$stmt = $pdo->prepare("SELECT id, customer_name, total_price, order_date, status FROM orders WHERE employee_id = ? ORDER BY order_date DESC LIMIT 5");
$stmt->execute([$employee_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch table bookings
$stmt2 = $pdo->prepare("SELECT id, persons, booking_date, booking_time, status FROM table_bookings ORDER BY booking_date DESC LIMIT 3");
$stmt2->execute();
$bookings = $stmt2->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>

<section class="dashboard-section">
    <div class="container">
        <h1>Employee Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card stat-card">
                <h3>Assigned Orders</h3>
                <span class="stat-value"><?= count($orders) ?></span>
            </div>
            <div class="card stat-card">
                <h3>Recent Bookings</h3>
                <span class="stat-value"><?= count($bookings) ?></span>
            </div>
        </div>

        <div class="recent-section">
            <h3>Recent Orders</h3>
            <?php if(empty($orders)): ?>
                <p>No assigned orders yet.</p>
            <?php else: ?>
                <table class="recent-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                        <tr>
                            <td>#<?= $order['id'] ?></td>
                            <td><?= htmlspecialchars($order['customer_name']) ?></td>
                            <td>₹<?= number_format($order['total_price'],2) ?></td>
                            <td><?= date('d M Y', strtotime($order['order_date'])) ?></td>
                            <td><?= ucfirst($order['status']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <h3>Recent Table Bookings</h3>
            <?php if(empty($bookings)): ?>
                <p>No recent bookings.</p>
            <?php else: ?>
                <ul>
                    <?php foreach($bookings as $b): ?>
                        <li><?= $b['persons'] ?> persons - <?= date('d M Y', strtotime($b['booking_date'])) ?> at <?= date('h:i A', strtotime($b['booking_time'])) ?> - <?= ucfirst($b['status']) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.dashboard-grid { display: flex; gap: 1rem; flex-wrap: wrap; margin: 2rem 0; }
.card.stat-card { flex: 1; min-width: 180px; padding: 1.5rem; background: #fff; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
.stat-value { font-size: 2rem; font-weight: 700; display: block; margin-top: 0.5rem; color: #6366f1; }
.recent-table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
.recent-table th, .recent-table td { padding: 0.6rem 0.8rem; border: 1px solid #ddd; text-align: center; }
.recent-section h3 { margin-top: 1.5rem; }
</style>

<?php include 'footer.php'; ?>

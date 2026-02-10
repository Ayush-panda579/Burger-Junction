<?php
require_once 'config.php';
$pageTitle = "Admin Dashboard";

// Protect page - only admin can access
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Fetch some stats
$total_users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$total_orders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$total_bookings = $pdo->query("SELECT COUNT(*) FROM table_bookings")->fetchColumn();
$total_menu = $pdo->query("SELECT COUNT(*) FROM menu_items")->fetchColumn();

include 'header.php';
?>

<section class="dashboard-section">
    <div class="container">
        <h1>Admin Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card stat-card">
                <h3>Total Users</h3>
                <span class="stat-value"><?= $total_users ?></span>
            </div>
            <div class="card stat-card">
                <h3>Total Orders</h3>
                <span class="stat-value"><?= $total_orders ?></span>
            </div>
            <div class="card stat-card">
                <h3>Table Bookings</h3>
                <span class="stat-value"><?= $total_bookings ?></span>
            </div>
            <div class="card stat-card">
                <h3>Menu Items</h3>
                <span class="stat-value"><?= $total_menu ?></span>
            </div>
        </div>

        <div class="quick-actions">
            <a href="manage_users.php" class="btn-primary">Manage Users</a>
            <a href="manage_orders.php" class="btn-secondary">Manage Orders</a>
            <a href="manage_menu.php" class="btn-outline">Manage Menu</a>
            <a href="manage_bookings.php" class="btn-info">Manage Bookings</a>
        </div>
    </div>
</section>

<style>
.dashboard-grid { display: flex; gap: 1rem; flex-wrap: wrap; margin: 2rem 0; }
.card.stat-card { flex: 1; min-width: 180px; padding: 1.5rem; background: #fff; border-radius: 12px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
.stat-value { font-size: 2rem; font-weight: 700; display: block; margin-top: 0.5rem; color: #6366f1; }
.quick-actions { display: flex; gap: 1rem; flex-wrap: wrap; }
.btn-primary { background: #6366f1; color: #fff; padding: 0.8rem 1.2rem; border-radius: 8px; text-decoration: none; }
.btn-secondary { background: #4f46e5; color: #fff; padding: 0.8rem 1.2rem; border-radius: 8px; text-decoration: none; }
.btn-outline { background: #fff; border: 2px solid #6366f1; color: #6366f1; padding: 0.8rem 1.2rem; border-radius: 8px; text-decoration: none; }
.btn-info { background: #10b981; color: #fff; padding: 0.8rem 1.2rem; border-radius: 8px; text-decoration: none; }
</style>

<?php include 'footer.php'; ?>

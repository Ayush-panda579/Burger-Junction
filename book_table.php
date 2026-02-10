<?php
require_once 'config.php';



$user_id = $_SESSION['user_id'];
$success = $error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name         = trim($_POST['name'] ?? '');
    $booking_date = $_POST['booking_date'] ?? '';
    $booking_time = $_POST['booking_time'] ?? '';
    $guests       = intval($_POST['guests'] ?? 0);

    if (empty($name) || empty($booking_date) || empty($booking_time) || $guests <= 0) {
        $error = "All fields are required and guests must be at least 1.";
    } else {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO table_bookings 
                (user_id, name, booking_date, booking_time, guests, created_at)
                VALUES (?, ?, ?, ?, ?, NOW())
            ");
            $stmt->execute([$user_id, $name, $booking_date, $booking_time, $guests]);
            $success = "Table booked successfully!";
        } catch (PDOException $e) {
            $error = "Failed to book table: " . htmlspecialchars($e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book a Table</title>
<style>
body { font-family: Arial; background: #f5f7fa; }
.container { max-width: 500px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);}
h1 { text-align: center; margin-bottom: 1.5rem; }
.form-group { margin-bottom: 1rem; }
label { display: block; margin-bottom: 0.3rem; }
input, select { width: 100%; padding: 0.7rem; border: 1px solid #ccc; border-radius: 6px; }
button { width: 100%; padding: 0.8rem; background: #6366f1; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; }
button:hover { background: #4f46e5; }
.alert { padding: 0.8rem; border-radius: 6px; margin-bottom: 1rem; }
.alert.error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
.alert.success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
</style>
</head>
<body>
<div class="container">
    <h1>Book a Table</h1>

    <?php if ($error): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="booking_date">Booking Date *</label>
            <input type="date" id="booking_date" name="booking_date" required>
        </div>

        <div class="form-group">
            <label for="booking_time">Booking Time *</label>
            <input type="time" id="booking_time" name="booking_time" required>
        </div>

        <div class="form-group">
            <label for="guests">Number of Guests *</label>
            <input type="number" id="guests" name="guests" min="1" required>
        </div>

        <button type="submit">Book Table</button>
    </form>
</div>
</body>
</html>

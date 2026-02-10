<?php
require_once 'config.php';
$pageTitle = "Login";

$error = '';
$old_email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $old_email = $email;

    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } else {
        $stmt = $pdo->prepare("SELECT id, full_name, password_hash FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            session_regenerate_id(true); // Security: prevent session fixation
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['last_login'] = time();

            header("Location: dashboard.php"); // redirect to dashboard
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}

include 'header.php';
?>
<div class="auth-container">
    <div class="auth-card">
        <h2>Login to Your Account</h2>

        <?php if ($error): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" class="auth-form" novalidate>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" value="<?= htmlspecialchars($old_email) ?>" required autofocus>
            </div>

            <div class="form-group">
                <label>Password *</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</div>

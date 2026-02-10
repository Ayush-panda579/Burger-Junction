<?php
require_once 'config.php';
$pageTitle = "Contact Us";
$success = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($message) < 10) {
        $error = "Message is too short.";
    } else {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO contact_messages (name, email, message, created_at) 
                VALUES (?, ?, ?, NOW())
            ");
            $stmt->execute([$name, $email, $message]);
            $success = "Thank you! Your message has been received. We'll get back to you soon.";
        } catch (PDOException $e) {
            $error = "Something went wrong. Please try again later.";
        }
    }
}

include 'header.php';
?>

<section class="contact-section">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="lead">We'd love to hear from you!</p>

        <div class="contact-info">
            <div class="info-item">
                <strong>Email:</strong> info@burgerjunctiondesitaste.com
            </div>
            <div class="info-item">
                <strong>Phone:</strong> 8691888890
            </div>
            <div class="info-item">
                <strong>Address:</strong><br>
                Shop No. 3, Ground Floor, Niranjan CHS,<br>
                Ward No. H, M.G. Road, Dombivli West
            </div>
        </div>

        <?php if ($success): ?>
            <div class="alert success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required 
                       value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required 
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="6" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </div>

            <button type="submit">Send Message</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>
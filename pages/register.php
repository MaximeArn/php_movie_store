<?php 
include '../components/header.php';
$error = isset($_GET['error']) ? urldecode($_GET['error']) : NULL;
?>
<main>
    <section class="login-page-container">
        
      <?php if ($error): ?>
          <div class="error-message">
              <?php echo htmlspecialchars($error); ?>
          </div>
      <?php endif; ?>

        <h1 class="login-page-title">Register</h1>
        <form action="../includes/register_process.php" method="POST" class="login-page-form">
            <div class="login-form-group">
                <label for="username" class="login-form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" class="login-form-input" required>
            </div>
            <div class="login-form-group">
                <label for="email" class="login-form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="login-form-input" required>
            </div>
            <div class="login-form-group">
                <label for="password" class="login-form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Choose a password" class="login-form-input" required>
            </div>
            <div class="login-form-group">
                <label for="confirm_password" class="login-form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" class="login-form-input" required>
            </div>
            <div class="login-form-actions">
                <button type="submit" class="login-form-btn">Register</button>
                <a href="login.php" class="login-register-link">Already have an account? Login</a>
            </div>
        </form>
    </section>
</main>
<?php 
include '../components/footer.php';
?>

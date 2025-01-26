<?php 
include '../components/header.php'
?>
<main>
    <section class="login-page-container">
        <h1 class="login-page-title">Login</h1>
        <form action="login_process.php" method="POST" class="login-page-form">
            <div class="login-form-group">
                <label for="username" class="login-form-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" class="login-form-input" required>
            </div>
            <div class="login-form-group">
                <label for="password" class="login-form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="login-form-input" required>
            </div>
            <div class="login-form-actions">
                <button type="submit" class="login-form-btn">Login</button>
                <a href="register.php" class="login-register-link">Don't have an account? Register</a>
            </div>
        </form>
    </section>
</main>


<?php 
include '../components/footer.php'
?>
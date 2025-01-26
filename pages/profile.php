<?php 
include '../components/header.php';
?>
<main>
    <section class="profile-page-container">
        <h1 class="profile-page-title">Your Profile</h1>
        <form action="../includes/logout_process.php" method="POST" class="logout-form">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </section>
</main>

<?php 
include '../components/footer.php';
?>
<?php 
include '../components/header.php';
require_once '../db/db_connect.php';
require_once '../controllers/users.php';
require_once '../controllers/purchases.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php?error=" . urlencode("Please log in to view your profile."));
    exit();
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$purchases = getUserPurchaseHistory($db, $userId);
?>

<main>
    <section class="profile-page-container">
        <h1 class="profile-page-title">Hello, <?php echo htmlspecialchars($username); ?>!</h1>
        
        <h2 class="purchase-history-title">Your Purchase History</h2>
        <?php if (empty($purchases)): ?>
            <p class="no-purchases-message">You haven't made any purchases yet. <a href="movies.php">Browse movies</a> to get started!</p>
        <?php else: ?>
            <ul class="purchase-history-list">
                <?php foreach ($purchases as $purchase): ?>
                    <li class="purchase-history-item">
                        <div class="purchase-details">
                            <p><strong>Movie:</strong> <?php echo htmlspecialchars($purchase['title']); ?></p>
                            <p><strong>Price:</strong> $<?php echo number_format($purchase['price'], 2); ?></p>
                            <p><strong>Purchased on:</strong> <?php echo htmlspecialchars($purchase['purchase_date']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="../includes/logout_process.php" method="POST" class="logout-form">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </section>
</main>

<?php 
include '../components/footer.php';
?>

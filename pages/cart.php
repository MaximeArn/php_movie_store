<?php 
include '../components/header.php';
require_once '../db/db_connect.php';
require_once '../controllers/carts.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php?error=" . urlencode("Please log in to access your cart."));
    exit();
}

$userId = $_SESSION['user_id'];
$cart = getUserCart($db, $userId);
?>

<main>
    <section class="cart-page-container">
        <h1 class="cart-page-title">Your Cart</h1>

        <?php if (empty($cart)): ?>
            <p class="empty-cart-message">Your cart is empty. <a href="movies.php">Browse movies</a> to add items.</p>
        <?php else: ?>
            <ul class="cart-items-list">
                <?php foreach ($cart as $item): 
                    include '../components/cart_item.php';
                endforeach; 
                ?>
            </ul>

            <div class="cart-summary">
                <p class="cart-total">Total: $<?php echo number_format(array_sum(array_column($cart, 'price')), 2); ?></p>
                <form action="../includes/cart_process.php" method="POST">
                    <button type="submit" name="action" value="checkout" class="checkout-btn">Checkout</button>
                </form>
            </div>
            
        <?php endif; ?>
    </section>
</main>

<?php 
include '../components/footer.php';
?>

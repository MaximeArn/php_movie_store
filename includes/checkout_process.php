<?php
require_once '../db/db_connect.php';
require_once '../controllers/carts.php';
require_once '../controllers/purchases.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php?error=" . urlencode("Please log in to complete your purchase."));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $cart = getUserCart($db, $userId);

    if (empty($cart)) {
        header("Location: ../pages/cart.php?error=" . urlencode("Your cart is empty."));
        exit();
    }

    $purchaseResult = processPurchase($db, $userId, $cart);

    if ($purchaseResult) {
        emptyUserCart($db, $userId);
        header("Location: ../pages/cart.php?success=" . urlencode("Purchase completed successfully!"));
    } else {
        header("Location: ../pages/cart.php?error=" . urlencode("Failed to process your purchase. Please try again."));
    }
    exit();
}
?>

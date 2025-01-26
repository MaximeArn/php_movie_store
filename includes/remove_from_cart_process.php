<?php
require_once '../db/db_connect.php';
require_once '../controllers/carts.php';
require_once '../controllers/movies.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php?error=" . urlencode("Please log in to remove items from your cart."));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $movieId = isset($_POST['movie_id']) ? intval($_POST['movie_id']) : 0;

    $movie = getMovieById($db, $movieId);
    if ($movie) {
        $result = removeMovieFromCart($db, $userId, $movieId);

        if ($result) {
            header("Location: ../pages/cart.php?success=" . urlencode("Movie removed from your cart!"));
        } else {
            header("Location: ../pages/cart.php?error=" . urlencode("Failed to remove movie from your cart."));
        }
    } else {
        header("Location: ../pages/cart.php?error=" . urlencode("Invalid movie ID."));
    }
    exit();
}
?>

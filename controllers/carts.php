<?php
function getUserCart($db, $userId) {
    try {
        $query = "
            SELECT 
                c.id AS cart_id,
                ci.id AS cart_item_id,
                ci.movie_id,
                m.title,
                m.price,
                m.image_url
            FROM carts c
            JOIN cart_items ci ON c.id = ci.cart_id
            JOIN movies m ON ci.movie_id = m.id
            WHERE c.user_id = :user_id
        ";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

function addMovieToCart($db, $userId, $movieId){
    try {
        $cartQuery = "SELECT id FROM carts WHERE user_id = :user_id";
        $stmt = $db->prepare($cartQuery);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cart) {
            $cartInsertQuery = "INSERT INTO carts (user_id) VALUES (:user_id)";
            $stmt = $db->prepare($cartInsertQuery);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $cartId = $db->lastInsertId();
        } else {
            $cartId = $cart['id'];
        }

        $cartItemQuery = "INSERT INTO cart_items (cart_id, movie_id) VALUES (:cart_id, :movie_id)";
        $stmt = $db->prepare($cartItemQuery);
        $stmt->bindParam(':cart_id', $cartId, PDO::PARAM_INT);
        $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error adding to cart: " . $e->getMessage());
        return false;
    }
} 

function removeMovieFromCart($db, $userId, $movieId) {
    try {
        $cartQuery = "SELECT id FROM carts WHERE user_id = :user_id";
        $stmt = $db->prepare($cartQuery);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cart) {
            return false;
        }

        $cartItemQuery = "DELETE FROM cart_items WHERE cart_id = :cart_id AND movie_id = :movie_id";
        $stmt = $db->prepare($cartItemQuery);
        $stmt->bindParam(':cart_id', $cart['id'], PDO::PARAM_INT);
        $stmt->bindParam(':movie_id', $movieId, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error removing movie from cart: " . $e->getMessage());
        return false;
    }
}
?>

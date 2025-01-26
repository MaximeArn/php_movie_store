<?php
function getUserPurchaseHistory($db, $userId) {
    try {
        $query = "
            SELECT 
                p.purchase_date,
                m.title,
                m.price
            FROM purchase_history p
            JOIN movies m ON p.movie_id = m.id
            WHERE p.user_id = :user_id
            ORDER BY p.purchase_date DESC
        ";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching purchase history: " . $e->getMessage());
        return [];
    }
}

function processPurchase($db, $userId, $cart) {
    try {
        $db->beginTransaction();

        foreach ($cart as $item) {
            $query = "
                INSERT INTO purchase_history (user_id, movie_id, purchase_date)
                VALUES (:user_id, :movie_id, NOW())
            ";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':movie_id', $item['movie_id'], PDO::PARAM_INT);
            $stmt->execute();
        }

        $db->commit();
        return true;
    } catch (PDOException $e) {
        $db->rollBack();
        error_log("Error processing purchase: " . $e->getMessage());
        return false;
    }
}
?>

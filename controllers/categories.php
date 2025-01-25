<?php 
function getCategories($db){
  try {
    $query = "SELECT * FROM categories";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

function getCategoryById($db, $categoryId){
  try {
    $categoryId = htmlspecialchars($categoryId);
    $query = "SELECT * FROM categories WHERE id = :categoryId";
    $stmt = $db->prepare($query);
    $stmt->bindParam('categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}


?>
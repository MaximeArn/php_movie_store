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
?>
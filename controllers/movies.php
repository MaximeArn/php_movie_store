<?php 
function getMovies($db, $nbrOfMovies = NULL) {
  try {
    $query = $nbrOfMovies ? "SELECT * FROM movies LIMIT :nbrOfMovies" : "SELECT * FROM movies";
    $stmt = $db->prepare($query);
    if ($nbrOfMovies) {
      $stmt->bindParam('nbrOfMovies', $nbrOfMovies, PDO::PARAM_INT);
    };
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

function getMovieById($db, $id){
  try {
    $id = htmlspecialchars($id);
    $query = "SELECT * FROM movies WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

function getMoviesByCategory($db, $categoryId){
  try {
    $categoryId = htmlspecialchars($categoryId);
    $query = "SELECT * FROM movies WHERE category_id = :categoryId";
    $stmt = $db->prepare($query);
    $stmt->bindParam('categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}
?>

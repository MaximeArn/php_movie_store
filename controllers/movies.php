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
    $query = "
            SELECT 
                m.id, 
                m.title, 
                m.description, 
                m.price, 
                m.image_url, 
                m.director, 
                m.category_id, 
                m.created_at,
                GROUP_CONCAT(a.name SEPARATOR ', ') AS actors
            FROM movies m
            LEFT JOIN movie_actors ma ON m.id = ma.movie_id
            LEFT JOIN actors a ON ma.actor_id = a.id
            WHERE m.id = :id
            GROUP BY m.id
    ";
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
    $query = "SELECT * FROM movies WHERE category_id = :categoryId";
    $stmt = $db->prepare($query);
    $stmt->bindParam('categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

function getMoviesByDirector($db, $director){
  try {
    $query = "SELECT * FROM movies WHERE director = :director";
    $stmt = $db->prepare($query);
    $stmt->bindParam('director', $director, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

function searchMovies($db, $searchQuery){
  try {
    $query = "SELECT * FROM movies WHERE title LIKE :searchQuery OR director LIKE :searchQuery";
    $stmt = $db->prepare($query);
    $searchQuery = '%' . $searchQuery . '%';
    $stmt->bindParam('searchQuery', $searchQuery, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "Error : ", $e->getMessage();
  }
}

?>

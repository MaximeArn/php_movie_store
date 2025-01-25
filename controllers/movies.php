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
?>

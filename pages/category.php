<?php 
include '../components/header.php';
include '../db/db_connect.php';
include '../controllers/movies.php';
include '../controllers/categories.php';


$categoryId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category = getCategoryById($db, $categoryId);

?>
<main>
    <?php  
    if(!$category){
        echo "<p> This category does not exist !</p>";
        exit;
    }
    $movies = getMoviesByCategory($db, $categoryId);
    
    ?>
    <section class="movies-list">
        <h1>Available movies</h1>
        <ul>
            <?php 
      foreach ($movies as $movie) {
        include '../components/movie_card.php';
      } ?>
      </ul>
    </section>
</main>
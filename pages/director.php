<?php 
include '../components/header.php';
include '../db/db_connect.php';
include '../controllers/movies.php';

$director = isset($_GET['director']) ? $_GET['director'] : "";
$movies = getMoviesByDirector($db, $director);

?>
<main>
  <?php 
  if(count($movies) == 0){
    echo "<p>No movies found !</p>";
    exit;
  }
  
  ?>
    <section class="movies-list">
        <h1>Movies for : <?php echo $director ?></h1>
        <ul>
        <?php 
      foreach ($movies as $movie) {
        include '../components/movie_card.php';
      } ?>
      </ul>
    </section>
</main>
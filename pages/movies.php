<?php 
include '../components/header.php';
include '../db/db_connect.php';
include '../controllers/movies.php';
?>
<main>
    <section class="movies-list">
        <h1>Available movies</h1>
        <ul>
        <?php 
      $movies = getMovies($db);
      foreach ($movies as $movie) {
        include '../components/movie_card.php';
      } ?>
      </ul>
    </section>
</main>
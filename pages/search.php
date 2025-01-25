<?php
include '../components/header.php';
include '../db/db_connect.php';
include '../controllers/movies.php';
?>

<main>
    <section class="search-section">
        <h1>Search Movies</h1>
        <form action="search.php" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search by title or director..." class="search-input" required>
            <button type="submit" class="search-button">Search</button>
        </form>
    </section>

    <section class="movies-list">
      <?php
            if (isset($_GET['query'])) {
              $query = htmlspecialchars($_GET['query']);
              $movies = searchMovies($db, $query);
              
              if (count($movies) > 0) {
                   echo "<h2>Search Results :</h2>";
                   echo "<ul class='movies '>";
                    foreach ($movies as $movie) {
                        include '../components/movie_card.php';
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No movies found for '<strong>$query</strong>'.</p>";
                }
            }
            ?>
    </section>
</main>

<?php include '../components/footer.php'; ?>

<?php 
  include '../components/header.php' ;
  include '../db/db_connect.php' ;
  include '../controllers/movies.php' ;

  $id = $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
  $movie = getMovieById($db, $id)
?>
<main>
  <?php 
  if(!$movie){
    echo "<p>Movie not found</p>";
    exit;
  };
  ?>
  <section class="movie-details">
        <div class="movie-poster">
            <img src="<?php echo htmlspecialchars($movie['image_url']); ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>">
        </div>
        <div class="movie-info">
            <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
            <p class="director"><strong>Director:</strong> <?php echo htmlspecialchars($movie['director']); ?></p>
            <p class="description"><?php echo htmlspecialchars($movie['description']); ?></p>
            <p class="price"><strong>Price:</strong> $<?php echo htmlspecialchars($movie['price']); ?></p>
            <a href="cart.php?action=add&id=<?php echo $movie['id']; ?>" class="btn">Add to Cart</a>
        </div>
    </section>
</main>

<?php include '../components/footer.php' ?>

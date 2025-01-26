<?php 
  include '../components/header.php' ;
  include '../db/db_connect.php' ;
  include '../controllers/movies.php' ;

  $id = $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
  $movie = getMovieById($db, $id);

  $imageUrl = htmlspecialchars($movie["image_url"]);
  $title = htmlspecialchars($movie['title']);
  $director = htmlspecialchars($movie['director']);
  $price = htmlspecialchars($movie['price']);
  $id = htmlspecialchars($movie['id']);
  $description = htmlspecialchars($movie['description']);
  $actors = htmlspecialchars($movie['actors']);
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
            <img src="<?php echo $imageUrl ?>" alt="<?php echo $title ?>">
        </div>
        <div class="movie-info">
            <h1><?php echo $title ?></h1>
            <p class="director">
                Directed by:
                 <a href="../pages/director.php?director=<?php echo $director?>"> <?php echo $director ?> </a>
            </p>
            <p>Actors : <?php echo $actors ?></p>
            <p class="description"><?php echo $description; ?></p>
            <p class="price"><strong>Price:</strong> $<?php echo $price ?></p>
            <a href="cart.php?action=add&id=<?php echo $id; ?>" class="btn">Add to Cart</a>
        </div>
    </section>
</main>

<?php include '../components/footer.php' ?>

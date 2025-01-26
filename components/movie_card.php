<?php 
    $imageUrl = htmlspecialchars($movie["image_url"]);
    $title = htmlspecialchars($movie['title']);
    $director = htmlspecialchars($movie['director']);
    $price = htmlspecialchars($movie['price']);
    $id = htmlspecialchars($movie['id']);
?>

<li class="movie-card">
    <img src="<?php echo $imageUrl ?>" alt="<?php echo $title?>" class="movie-image">
    <h3 class="movie-title"><?php echo $title ?></h3>
    <p class="movie-director">
        Directed by:
        <a href="../pages/director.php?director=<?php echo $director?>"> <?php echo $director ?> </a>
    </p>
    <p class="movie-price">Price: $<?php echo $price ?></p>
    <a href="../pages/movie_details.php?id=<?php echo $id ?>" class="btn">View Details</a>
</li>

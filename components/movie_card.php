<li class="movie-card">
    <img src="<?php echo htmlspecialchars($movie["image_url"]) ?>" alt="<?php echo htmlspecialchars($movie['title']); ?>" class="movie-image">
    <h3 class="movie-title"><?php echo htmlspecialchars($movie['title']); ?></h3>
    <p class="movie-director">Directed by: <?php echo htmlspecialchars($movie['director']); ?></p>
    <p class="movie-price">Price: $<?php echo htmlspecialchars($movie['price']); ?></p>
    <a href="../pages/movie_details.php?id=<?php echo htmlspecialchars($movie['id']); ?>" class="btn">View Details</a>
</li>

<?php
include './components/header.php';
include './db/db_connect.php';

?>
<main>
    <section class="welcome">
      <h1>Welcome to Movie Store</h1>
      <p>Your one-stop destination for the best movies online. Browse, buy, and enjoy your favorite movies anytime, anywhere!</p>
    </section>
     <section class="cta">
      <h2>Discover Your Next Favorite Movie</h2>
      <p>Explore our extensive library and uncover hidden gems or revisit timeless classics. With just a few clicks, you can start building your collection today!</p>
      <a href="search.php" class="btn">Search Movies</a>
    </section>
  
    <section class="latest-movies">
      <h2>Latest Movies</h2>
    </section>
</main>

<?php include './components/footer.php'; ?>

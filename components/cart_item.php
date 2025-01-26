<?php 
  $imageUrl = htmlspecialchars($item['image_url']);
  $title = htmlspecialchars($item['title']);
  $price = $item['price'];
  $id = $item['movie_id'];
?>
<li class="cart-item">
  <img src="<?php echo $imageUrl ?>" alt="<?php echo $title ?>" class="cart-item-image">
  <div class="cart-item-details">
    <h2 class="cart-item-title"><?php echo $title ?></h2>
    <p class="cart-item-price">$<?php echo number_format($price, 2); ?></p>
    <form action="../includes/remove_from_cart_process.php" method="POST">
      <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
      <button type="submit" name="action" value="remove" class="remove-item-btn">Remove</button>
    </form>
  </div>
</li>
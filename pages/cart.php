<?php 
include '../components/header.php';
include '../db/db_connect.php';
?>
<main>
  <?php if (!isset($_SESSION["user_id"])) {
    header("Location: ./login.php" );
  } 
  ?>
  <p>welcome</p>
</main>

<?php 
  include '../components/footer.php'
?>
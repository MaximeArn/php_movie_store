<?php 
try {
  $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=movie_store", "root", "root",);
} catch (PDOException $e) {
  echo $e;
}
?>
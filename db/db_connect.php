<?php 
try {
  $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=movie_store", "root", "root",);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
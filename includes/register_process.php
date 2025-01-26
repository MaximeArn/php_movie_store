<?php
require_once '../db/db_connect.php';
require_once '../controllers/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    $error = NULL;

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    }  else {
        $result = createUser($db, $username, $email, $password);

        if ($result === true) {
          header("Location: ../pages/login.php");
          exit();
      } else {
          $error = $result;
      }
    }

    header("Location: ../pages/register.php?error=" . urlencode($error));
    exit();
}
?>

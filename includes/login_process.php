<?php
require_once '../db/db_connect.php';
require_once '../controllers/users.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Both fields are required.";
        header("Location: ../pages/login.php?error=" . urlencode($error));
        exit();
    }

    $user = getUserByEmail($db, $email);

    if (!$user) {
        $error = "Invalid email or password.";
        header("Location: ../pages/login.php?error=" . urlencode($error));
        exit();
    }

    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        header("Location: ../../");
        exit();
    } else {
        $error = "Invalid email or password.";
        header("Location: ../pages/login.php?error=" . urlencode($error));
        exit();
    }
}

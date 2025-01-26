<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies renting</title>
    <link rel="stylesheet" href="../assets/styles/global.css">
    <link rel="stylesheet" href="../assets/styles/header.css">
    <link rel="stylesheet" href="../assets/styles/footer.css">
    <link rel="stylesheet" href="../assets/styles/movie_card.css">
    <link rel="stylesheet" href="../assets/styles/home_page.css">
    <link rel="stylesheet" href="../assets/styles/movie_details.css">
    <link rel="stylesheet" href="../assets/styles/categories.css">
    <link rel="stylesheet" href="../assets/styles/movies.css">
    <link rel="stylesheet" href="../assets/styles/search.css">
    <link rel="stylesheet" href="../assets/styles/auth.css">
    <link rel="stylesheet" href="../assets/styles/profile.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <div class="navLinks">
                    <li><a href="../pages/movies.php">Movies</a></li>
                    <li><a href="../pages/search.php">Search</a></li>
                    <li><a href="../pages/categories.php">Categories</a></li>
                </div>
                <?php 
                echo "<div>";
                session_start();
                if (isset($_SESSION["user_id"])) {
                    echo "<li><a href=\"../pages/cart.php\">Cart</a></li>";
                    echo "<li><a href=\"../pages/profile.php\">Profile</a></li>";
                }else{
                    echo "<li><a href=\"../pages/login.php\">Login</a></li>";
                    echo "<li><a href=\"../pages/register.php\">Register</a></li>";
                }
                echo "</div>";
                ?>
            </ul>
        </nav>
    </header>

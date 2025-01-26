<?php 
include '../components/header.php';
include '../db/db_connect.php';
include '../controllers/categories.php';

$categories = getCategories($db);
?>
<main>
    <section class="categories">
        <h1>Categories</h1>
        <ul class="category-list">
            <?php foreach ($categories as $category): ?>
                <a href="category.php?id=<?php echo htmlspecialchars($category['id']); ?>">
                <li class="category-item">
                    <?php echo htmlspecialchars($category['name']); ?>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
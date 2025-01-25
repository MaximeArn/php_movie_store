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
                <li class="category-item">
                    <a href="category.php?id=<?php echo htmlspecialchars($category['id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
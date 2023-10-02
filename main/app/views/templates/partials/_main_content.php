<!-- Main content -->
<main class="w-full md:w-3/4 p-3">
    <!-- Hero Recipe Card -->
    <!-- La recette vedette -->
    <?php include_once '../app/views/recipes/indexRandom.php'; ?>
    
    <!-- Les recettes populaires sont là -->
    <?php include_once '../app/views/recipes/index.php'; ?>

    <!-- User Profile Section -->
    <?php include_once '../app/views/chefs/indexRated.php'; ?>
</main>
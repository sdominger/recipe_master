<section class="relative mb-6">
<?php
    include_once '../app/models/recipesModel.php';
    $dishes = \App\Models\RecipesModel\findRandom($connexion);
    include '../app/views/recipes/_indexRandom.php';
?>
</section>
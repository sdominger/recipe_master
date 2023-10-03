<section>
<?php 
    include_once '../app/models/recipesModel.php';
    $dishes = \App\Models\RecipesModel\findRecentRecipes($connexion);
    include '../app/views/recipes/_index.php';
?>
</section>
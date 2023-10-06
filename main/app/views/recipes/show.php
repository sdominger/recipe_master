<!-- Recipe Detail -->
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
<?php 
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/commentsModel.php';
    $dish = \App\Models\RecipesModel\findOneRecipeById($connexion, $id);
    $comments = \App\Models\CommentsModel\findAllCommentsById($connexion, $id);
    include '../app/views/recipes/_show.php';
?>
</section>

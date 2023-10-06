<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\CommentsModel;

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/recipesModel.php';
    $dish = RecipesModel\findOneRecipeById($connexion, $id);

    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAllCommentsById($connexion, $id);

    global $title, $content;
    $title = $dish['recipe_name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}

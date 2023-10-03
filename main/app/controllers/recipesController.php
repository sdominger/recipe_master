<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $dishes = RecipesModel\findRecentRecipes($connexion);

    global $title, $content;
    $title = "Recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
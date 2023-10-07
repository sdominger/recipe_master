<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\CommentsModel; // Ajout du namespace pour CommentsModel

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

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/commentsModel.php';

    $dish = RecipesModel\findOneRecipeById($connexion, $id);
    $comments = CommentsModel\findAllCommentsById($connexion, $id);

    global $title, $content;
    $title = $dish['recipe_name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}

function showByChefIdAction(\PDO $connexion, int $id)
{
    include_once '../app/models/recipesModel.php';
    $dishChefId = RecipesModel\findRecipesByChefId($connexion, $id);

    global $title, $content;
    $title = "Recettes";
    ob_start();
    include '../app/views/chefs/show.php';
    $content = ob_get_clean();
}
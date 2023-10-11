<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;
use \App\Models\UsersModel;
use \App\Models\IngredientsModel;
use \App\Models\CategoriesModel;

include_once '../app/models/recipesModel.php';
include_once '../app/models/usersModel.php';
include_once '../app/models/ingredientsModel.php';
include_once '../app/models/categoriesModel.php';

function indexAction(\PDO $connexion)
{
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "Liste des recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function addAction(\PDO $connexion)
{
    $users = UsersModel\findAll($connexion);
    $ingredients = IngredientsModel\findAll($connexion);
    $categories = CategoriesModel\findAll($connexion);

    global $title, $content;
    $title = "Ajouter des recettes";
    ob_start();
    include '../app/views/recipes/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data)
{
    $data['prep_time'] = $data['prep_time'] . ' minutes'; // Ajoutez "minutes" à la valeur de prep_time

    $recipe = RecipesModel\insertOne($connexion, $data);
    $lastInsertID = RecipesModel\getLastInsertID($connexion); // Obtenez la dernière ID insérée

    foreach ($data['ingredients'] as $ingredientID) {
        $quantity = $data['ingredient_quantity'][$ingredientID];
        $return = RecipesModel\insertIngredientById($connexion, $lastInsertID, $ingredientID, $quantity);
    }

    header('location: ' . ADMIN_ROOT . 'recipes');
}

function deleteAction(\PDO $connexion, int $id) {
    $return1 = RecipesModel\deleteRecipesHasIngredientsByRecipeId($connexion, $id);
    $return2 = RecipesModel\deleteOneById($connexion, $id);
    header('location: ' . ADMIN_ROOT . 'recipes');
}
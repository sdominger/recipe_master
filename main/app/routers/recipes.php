<?php

switch ($_GET['recipes']) {
    case 'show':
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\showAction($connexion, $_GET['id']);
        break;

    case 'showByChef':
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\showByChefIdAction($connexion, $_GET['chef_id']);
        break;

    default:
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\indexAction($connexion);
        break;
}
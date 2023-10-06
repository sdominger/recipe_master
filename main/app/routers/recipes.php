<?php

switch ($_GET['recipes']) {
    case 'show':
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\showAction($connexion, $_GET['id']);
        break;

    default:
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\indexAction($connexion);
        break;
}

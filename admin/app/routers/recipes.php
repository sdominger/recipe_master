<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case'add':
        RecipesController\addAction($connexion);
    break;
    case'create':
        RecipesController\createAction($connexion, $_POST);
    break;
    case'delete':
        RecipesController\deleteAction($connexion, $_GET['id']);
    break;
    default:
        RecipesController\indexAction($connexion);
        break;
endswitch;
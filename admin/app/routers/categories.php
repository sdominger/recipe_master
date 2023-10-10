<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addAction();
        break;
    case 'create':
        CategoriesController\createAction($connexion, $_POST);
        break;
    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;
    case 'edit':
        CategoriesController\editAction($connexion, $_GET['id']);
        break;
    case 'editUpdate':
        CategoriesController\editUpdateAction($connexion, [
            'id' =>    $_GET['id'],
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ]);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
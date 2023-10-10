<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';

function indexAction(\PDO $connexion)
{
    $categories = CategoriesModel\findAll($connexion);

    global $title, $content;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function addAction()
{
    global $title, $content;
    $title = "Ajouter une catégorie";
    ob_start();
    include '../app/views/categories/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, array $data)
{
    $categorie = CategoriesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}

function deleteAction(\PDO $connexion, int $id)
{
    $return = CategoriesModel\delete($connexion, $id);
    header('location: ' . ADMIN_ROOT . 'categories');
}

function editAction(\PDO $connexion, int $id)
{
    $category = CategoriesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = "Modification d'une catégorie";
    ob_start();
    include '../app/views/categories/edit.php';
    $content = ob_get_clean();
}

function editUpdateAction(\PDO $connexion, array $data)
{
    $return = CategoriesModel\update($connexion, $data);
    header('location: ' . ADMIN_ROOT . 'categories');
}
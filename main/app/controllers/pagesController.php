<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $dishes = \App\Models\recipesModel\findRandom($connexion);

    include_once '../app/models/chefsModel.php';
    $users = \App\Models\chefsModel\findMostRatedUser($connexion);

    global $title, $content;
    $title = "Home";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}

<?php

namespace App\Controllers\ChefsController;

use \App\Models\ChefsModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/chefsModel.php';
    $users = ChefsModel\findRecentUsers($connexion);

    global $title, $content;
    $title = "Chefs";
    ob_start();
    include '../app/views/chefs/index.php';
    $content = ob_get_clean();
}
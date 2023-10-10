<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

function dashboardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Dashboard";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}

function logoutAction()
{
    // Mise à mort de la variable de session 'user'
    unset($_SESSION['user']);
    // Redirection vers le site public
    header('location: ' .  PUBLIC_ROOT);
}
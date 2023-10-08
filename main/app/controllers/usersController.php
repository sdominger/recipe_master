<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

function loginFormAction()
{

    global $title, $content;
    $title = "Connexion";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}

function loginAction(\PDO $connexion)
{
    include '../app/models/usersModel.php';

    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = UsersModel\findOneByPseudo($connexion, [
        'name' => $name,
        'password' => $password
    ]);

    var_dump($user);
    die();
}

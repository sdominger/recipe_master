<?php

use App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):

    case 'loginForm':
        UsersController\loginFormAction($connexion);
        break;
    case 'login':
        UsersController\loginAction($connexion, [
            'name' =>     $_POST['name'],
            'password' => $_POST['password']
        ]);
        break;
endswitch;
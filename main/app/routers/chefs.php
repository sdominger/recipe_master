<?php
switch ($_GET['chefs']):
    case 'show':
        include_once '../app/controllers/chefsController.php';
        \App\Controllers\ChefsController\showAction($connexion, $_GET['id']);
        break;

    default:
        include_once '../app/controllers/chefsController.php';
        \App\Controllers\ChefsController\indexAction($connexion);
        break;
endswitch;
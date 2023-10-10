<?php

if (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

elseif (isset($_GET[('users')])) :
    include_once '../app/routers/users.php';

else:
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
    
endif;
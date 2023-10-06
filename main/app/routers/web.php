<?php 

if (isset($_GET['chefs'])) :
    include_once '../app/routers/chefs.php';

elseif (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

elseif (isset($_GET['comments'])) :
    include_once '../app/routers/comments.php';

else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
?>

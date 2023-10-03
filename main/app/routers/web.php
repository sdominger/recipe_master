<?php    
if (isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
?>

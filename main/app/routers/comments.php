<?php
    include_once '../app/controllers/commentsController.php';
    \App\Controllers\CommentsController\showAction($connexion, $_GET['id']);
?>
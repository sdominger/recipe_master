<?php
    include_once '../app/models/chefsModel.php';
    $users = \App\Models\ChefsModel\findRecentUsers($connexion);
    include '../app/views/chefs/_index.php';
?>
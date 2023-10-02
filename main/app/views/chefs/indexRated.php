<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
<?php
    include_once '../app/models/chefsModel.php';
    $users = \App\Models\ChefsModel\findMostRatedUser($connexion);
    $dishes = \App\Models\ChefsModel\findRecipesMostRatedUser($connexion);
    include '../app/views/chefs/_indexRated.php';
?>
</section>
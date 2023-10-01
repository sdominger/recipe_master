<?php foreach ($dishes as $dish) : ?>
<img class="w-full h-96 object-cover" src="<?php echo $dish['picture']; ?>" alt="Featured Recipe Image"/>
    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white"><?php echo $dish['recipe_name']; ?></h1>
        <div class="flex items-center mb-4">
        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
        <span class="text-white"><?php echo $dish['avg_rating']; ?></span>
    </div>
    <p class="text-gray-300 mb-4"><?php echo $dish['description']; ?></p>
    <div class="flex items-center mb-4">
        <span class="text-gray-400 mr-2">Par <?php echo $dish['user_name']; ?></span>
        <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $dish['comment_count']; ?> commentaire(s)</span>
    </div>
    <a href="recipe.html" class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir la recette</a>
    </div>
<?php endforeach; ?>
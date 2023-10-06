<!-- Recipe Image -->
    <img
      class="w-full h-96 object-cover rounded-t-lg"
      src="<?php echo $dish['recipe_picture']; ?>"
      alt="Nom de la recette"
    />

    <!-- Recipe Info -->
    <div class="p-4">
      <h1 class="text-3xl font-bold mb-4"><?php echo $dish['recipe_name']; ?></h1>
      <div class="flex items-center mb-4">
        <span class="text-yellow-500 mr-1">
          <i class="fas fa-star"></i>
        </span>
        <span><?php echo $dish['avg_rating']; ?></span>
        <span class="ml-4 text-gray-700">
          <i class="fas fa-clock"></i> <?php echo $dish['recipe_prep_time']; ?>
        </span>
      </div>
      <p class="text-gray-700 mb-4">
      <?php echo $dish['recipe_description']; ?>
      </p>
      <div class="flex items-center mb-4">
        <span class="text-gray-700 mr-2">Par <?php echo $dish['user_name']; ?></span>
        <span class="text-gray-500">
          <i class="fas fa-comment"></i> <?php echo $dish['comment_count']; ?> commentaires
        </span>
      </div>
    </div>

    <!-- Ingredients -->
    <div class="p-4 border-t">
      <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
        <ul class="list-disc pl-5">
          <li><?php echo $dish['ingredient_list']; ?></li>
          <!-- ... (autres ingrédients) ... -->
        </ul>
    </div>

    <!-- Steps -->
    <div class="p-4 border-t">
      <h2 class="text-2xl font-bold mb-4">Étapes</h2>
      <ol class="list-decimal pl-5">
        <li>Préchauffez le four à 180°C.</li>
        <li>Dans un saladier, mélangez la farine et le sucre.</li>
        <li>
          Ajoutez les œufs un à un en mélangeant bien entre chaque ajout.
        </li>
        <!-- ... (autres étapes) ... -->
      </ol>
    </div>
  <?php  include_once '../app/views/comments/show.php'; ?>

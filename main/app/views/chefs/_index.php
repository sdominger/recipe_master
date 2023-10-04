          <!-- User Info -->
          <?php foreach ($users as $user) : ?>
          <section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
          <div class="flex items-center mb-6">
            <!-- User Avatar -->
            <img src="../documents/pictures/<?php echo $user['user_picture']; ?>" alt="Nom de l'utilisateur" class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4"/>

            <!-- User Details -->
            <div>
              <h3 class="text-2xl font-bold"><?php echo $user['user_name']; ?></h3>
              <p class="text-gray-400">Membre depuis le: <?php echo $user['user_created_at']; ?></p>
              <p class="text-gray-400">Nombre de recettes postées: <?php echo $user['number_recipes_posted']; ?></p>
            </div>
          </div>

          <!-- User Actions -->
          <div class="flex justify-between items-center mb-4">
            <a href="user_recipes.html" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
          </div>
          </section>
          <?php endforeach ; ?>
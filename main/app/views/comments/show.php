<!-- Comments -->
<div class="p-4 border-t">
    <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
    <!-- Comment -->
    <?php foreach ($comments as $comment) : ?>
        <div class="mb-4">
            <?php if (!empty($comment['user_name']) && !empty($comment['user_picture'])) : ?>
                <div class="flex items-center mb-2">
                    <img
                        src="/script_serveur/year2/recipe_master/main/documents/pictures/<?php echo $comment['user_picture']; ?>"
                        alt="Nom de l'utilisateur"
                        class="w-10 h-10 rounded-full mr-2"
                    />
                    <span class="font-bold"><?php echo $comment['user_name']; ?></span>
                </div>
            <?php endif; ?>
            <p class="text-gray-700">
                <?php echo $comment['comment_content']; ?>
            </p>
        </div>
    <?php endforeach; ?>
    <!-- ... (autres commentaires) ... -->
</div>

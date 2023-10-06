<?php

namespace App\Models\CommentsModel;

use \PDO; // Ajoutez l'utilisation du namespace PDO

function findAllCommentsById(PDO $connexion, int $recipeId): array
{
    $sql = "SELECT
                comments.content AS comment_content,
                users.name AS user_name,
                users.picture AS user_picture
            FROM
                comments
            LEFT JOIN
                users ON comments.user_id = users.id
            WHERE
                comments.dish_id = :recipe_id";

    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':recipe_id', $recipeId, PDO::PARAM_INT);
    $stmt->execute();

    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifie si aucun commentaire n'a été trouvé
    if (empty($comments)) {
        $comments[] = array(
            'comment_content' => 'Aucun commentaire n\'a été trouvé pour cette recette.',
            'user_name' => '', // Vous pouvez personnaliser ces valeurs
            'user_picture' => ''
        );
    }

    return $comments;
}

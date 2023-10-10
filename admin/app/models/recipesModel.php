<?php

namespace App\Models\RecipesModel;

function findRandom(\PDO $connexion): array
{
    // Sélectionner un ID de recette aléatoire
    $sqlRandom = "SELECT id FROM dishes ORDER BY RAND() LIMIT 1";
    $stmtRandom = $connexion->query($sqlRandom);
    $randomRecipeId = $stmtRandom->fetchColumn();

    // Obtenir les détails de la recette aléatoire
    $sqlRecipe = "SELECT
                    dishes.id AS recipe_id,
                    dishes.name AS recipe_name,
                    dishes.description,
                    dishes.picture,
                    ROUND(AVG(ratings.value), 1) AS avg_rating,
                    users.name AS user_name
                FROM dishes
                LEFT JOIN ratings ON dishes.id = ratings.dish_id
                INNER JOIN users ON dishes.user_id = users.id
                WHERE dishes.id = :recipe_id
                GROUP BY dishes.id, dishes.name, dishes.description, users.name";
    
    $stmtRecipe = $connexion->prepare($sqlRecipe);
    $stmtRecipe->bindValue(':recipe_id', $randomRecipeId, \PDO::PARAM_INT);
    $stmtRecipe->execute();

    // Obtenir le nombre de commentaires pour la recette aléatoire
    $sqlCommentCount = "SELECT COUNT(id) AS comment_count FROM comments WHERE dish_id = :recipe_id";
    $stmtCommentCount = $connexion->prepare($sqlCommentCount);
    $stmtCommentCount->bindValue(':recipe_id', $randomRecipeId, \PDO::PARAM_INT);
    $stmtCommentCount->execute();
    $commentCount = $stmtCommentCount->fetchColumn();

    // Ajouter le nombre de commentaires aux détails de la recette
    $recipeDetails = $stmtRecipe->fetch(\PDO::FETCH_ASSOC);
    $recipeDetails['comment_count'] = $commentCount;

    return [$recipeDetails];
}

function findThreePopulars(\PDO $connexion): array
{
    $sql = "SELECT dishes.id AS recipe_id,
                   dishes.name AS recipe_name,
                   dishes.description,
                   dishes.picture,
                   ROUND(AVG(ratings.value), 1) AS avg_rating,
                   (
                       SELECT COUNT(DISTINCT comments.id)
                       FROM comments
                       WHERE comments.dish_id = dishes.id
                   ) AS comment_count,
                   users.name AS user_name
            FROM dishes
            INNER JOIN ratings ON dishes.id = ratings.dish_id
            INNER JOIN users ON dishes.user_id = users.id
            GROUP BY dishes.id, dishes.name, dishes.description, dishes.picture, users.name
            ORDER BY AVG(ratings.value) DESC
            LIMIT 3;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findRecentRecipes(\PDO $connexion): array
{
    $sql = "SELECT dishes.id AS recipe_id,
                   dishes.name AS recipe_name,
                   dishes.description,
                   dishes.picture,
                   ROUND(AVG(ratings.value), 1) AS avg_rating,
                   (
                       SELECT COUNT(comments.id)
                       FROM comments
                       WHERE comments.dish_id = dishes.id
                   ) AS comment_count,
                   users.name AS user_name
            FROM dishes
            INNER JOIN ratings ON dishes.id = ratings.dish_id
            INNER JOIN users ON dishes.user_id = users.id
            GROUP BY dishes.id, dishes.name, dishes.description, users.name
            ORDER BY dishes.created_at DESC, dishes.id DESC
            LIMIT 9;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findOneRecipeById(\PDO $connexion, int $recipeId): array
{
    $sql = "SELECT
                dishes.id AS recipe_id,
                dishes.name AS recipe_name,
                dishes.description AS recipe_description,
                dishes.prep_time AS recipe_prep_time,
                dishes.picture AS recipe_picture,
                ROUND(AVG(ratings.value), 1) AS avg_rating,
                (
                    SELECT COUNT(comments.id)
                    FROM comments
                    WHERE comments.dish_id = dishes.id
                ) AS comment_count,
                users.name AS user_name,
                GROUP_CONCAT(DISTINCT ingredients.name SEPARATOR '<li>') AS ingredient_list
            FROM
                dishes
            LEFT JOIN
                ratings ON dishes.id = ratings.dish_id
            LEFT JOIN
                users ON dishes.user_id = users.id
            LEFT JOIN
                dishes_has_ingredients ON dishes.id = dishes_has_ingredients.dish_id
            LEFT JOIN
                ingredients ON dishes_has_ingredients.ingredient_id = ingredients.id
            WHERE
                dishes.id = :recipe_id
            GROUP BY
                dishes.id, dishes.name, dishes.description, dishes.prep_time, dishes.picture, users.name";

    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':recipe_id', $recipeId, \PDO::PARAM_INT);
    $stmt->execute();

    $recipeData = $stmt->fetch(\PDO::FETCH_ASSOC);

    // Vérifier s'il y a des ingrédients
    if (empty($recipeData['ingredient_list'])) {
        $recipeData['ingredient_list'] = 'Aucun ingrédient disponible.';
    }

    return $recipeData;
}

function findRecipesByChefId(\PDO $connexion, int $chefId): array
{
    $sql = "SELECT
                dishes.id AS recipe_id,
                dishes.name AS recipe_name,
                ROUND(AVG(ratings.value), 1) AS avg_rating,
                dishes.description AS recipe_description,
                dishes.picture AS recipe_picture
            FROM
                dishes
            LEFT JOIN
                ratings ON dishes.id = ratings.dish_id
            WHERE
                dishes.user_id = :chef_id
            GROUP BY
                dishes.id, dishes.name, dishes.description";

    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':chef_id', $chefId, \PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
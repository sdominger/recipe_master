<?php

namespace App\Models\RecipesModel;

function findRandom(\PDO $connexion): array
{
    $sql = "SELECT dishes.name AS recipe_name,
                   dishes.description,
                   dishes.picture,
                   ROUND(AVG(ratings.value), 1) AS avg_rating,
                   COUNT(comments.id) AS comment_count,
                   users.name AS user_name
            FROM dishes
            INNER JOIN ratings ON dishes.id = ratings.dish_id
            LEFT JOIN comments ON dishes.id = comments.dish_id
            INNER JOIN users   ON dishes.user_id = users.id
            GROUP BY dishes.id, dishes.name, dishes.description, users.name
            ORDER BY RAND()
            LIMIT 1;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findThreePopulars(\PDO $connexion): array
{
    $sql = "SELECT dishes.name AS recipe_name,
                   dishes.description,
                   dishes.picture,
                   ROUND(AVG(ratings.value), 1) AS avg_rating,
                   COUNT(comments.id) AS comment_count,
                   users.name AS user_name
            FROM dishes
            INNER JOIN ratings ON dishes.id = ratings.dish_id
            LEFT JOIN comments ON dishes.id = comments.dish_id
            INNER JOIN users   ON dishes.user_id = users.id
            GROUP BY dishes.id, dishes.name, dishes.description, users.name
            ORDER BY AVG(ratings.value) DESC
            LIMIT 3;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findRecentRecipes(\PDO $connexion): array
{
    $sql = "SELECT dishes.name AS recipe_name,
                   dishes.description,
                   dishes.picture,
                   ROUND(AVG(ratings.value), 1) AS avg_rating,
                   COUNT(comments.id) AS comment_count,
                   users.name AS user_name
            FROM dishes
            INNER JOIN ratings ON dishes.id = ratings.dish_id
            LEFT JOIN comments ON dishes.id = comments.dish_id
            INNER JOIN users ON dishes.user_id = users.id
            GROUP BY dishes.id, dishes.name, dishes.description, users.name
            ORDER BY dishes.created_at DESC, dishes.id DESC
            LIMIT 9;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
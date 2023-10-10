<?php

namespace App\Models\ChefsModel;

function findMostRatedUser(\PDO $connexion): array 
{
    $sql = "SELECT
                users.id AS user_id,
                users.name AS user_name,
                users.picture AS user_picture,
                users.created_at AS user_created_at,
                COUNT(*) AS number_recipes_posted
            FROM users
            INNER JOIN dishes ON users.id = dishes.user_id
            GROUP BY users.id, users.name, users.picture, users.created_at
            ORDER BY AVG((SELECT AVG(value) 
                        FROM ratings
                        WHERE ratings.dish_id = dishes.id)) DESC
            LIMIT 1;
    ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findRecipesMostRatedUser(\PDO $connexion): array
{
    $sql = "SELECT
                dishes.id AS recipe_id,
                dishes.name AS recipe_name,
                dishes.description,
                dishes.picture,
                ROUND(AVG(COALESCE(ratings.value, 0)), 1) AS avg_rating,
                COUNT(comments.id) AS comment_count,
                users.name AS user_name
            FROM dishes
            LEFT JOIN ratings ON dishes.id = ratings.dish_id
            LEFT JOIN comments ON dishes.id = comments.dish_id
            INNER JOIN users ON dishes.user_id = users.id
            WHERE users.id = (
                SELECT d.user_id
                FROM dishes AS d
                INNER JOIN ratings AS r ON d.id = r.dish_id
                GROUP BY d.user_id
                ORDER BY AVG(r.value) DESC
                LIMIT 1
            )
            GROUP BY dishes.id, dishes.name, dishes.description, dishes.picture, users.name
            ORDER BY AVG(COALESCE(ratings.value, 0)) DESC;
    ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findRecentUsers(\PDO $connexion): array 
{
    $sql = "SELECT
                users.id AS user_id,
                users.name AS user_name,
                users.picture AS user_picture,
                users.created_at AS user_created_at,
                (SELECT COUNT(*) FROM dishes WHERE user_id = users.id) AS number_recipes_posted
            FROM users
            ORDER BY users.created_at DESC, users.id DESC
            LIMIT 9;
    ";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneChefById(\PDO $connexion, int $id): array
{
    // Requête pour récupérer les informations de l'utilisateur
    $sqlUser = "SELECT
                users.id AS user_id,
                users.name AS user_name,
                users.biography AS user_biography,
                users.picture AS user_picture
            FROM
                users
            WHERE
                users.id = :id";

    $stmtUser = $connexion->prepare($sqlUser);
    $stmtUser->bindValue(':id', $id, \PDO::PARAM_INT);
    $stmtUser->execute();

    return $stmtUser->fetch(\PDO::FETCH_ASSOC);
}
<?php

namespace App\Models\RecipesModel;

include_once '../app/models/categoriesModel.php';

function getLastInsertID(\PDO $connexion)
{
    return $connexion->lastInsertId();
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT
        dishes.id,
        dishes.name,
        dishes.description,
        dishes.prep_time,
        dishes.portions,
        dishes.created_at,
        users.name AS user_name,
        types_of_dishes.name AS category_name,
        GROUP_CONCAT(ingredients.name ORDER BY ingredients.name ASC SEPARATOR ', ') AS ingredients
    FROM dishes
    JOIN users ON dishes.user_id = users.id
    JOIN types_of_dishes ON dishes.type_id = types_of_dishes.id
    LEFT JOIN dishes_has_ingredients ON dishes.id = dishes_has_ingredients.dish_id
    LEFT JOIN ingredients ON dishes_has_ingredients.ingredient_id = ingredients.id
    GROUP BY dishes.id
    ORDER BY dishes.id DESC;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
            SET name = :name,
                description = :description,
                prep_time = :prep_time,
                portions = :portions,
                user_id = :user_id,
                type_id = :type_id,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $data['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $data['portions'], \PDO::PARAM_INT);
    $rs->bindValue(':user_id', $data['user_name'], \PDO::PARAM_INT);
    $rs->bindValue(':type_id', $data['category'], \PDO::PARAM_INT);
    return $rs->execute();
}

function insertIngredientById(\PDO $connexion, int $recipeID, int $ingredientID, float $quantity) 
{
    $sql = "INSERT INTO dishes_has_ingredients (dish_id, ingredient_id, quantity)
            VALUES (:recipe, :ingredient, :quantity)
            ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity);";
    
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recipe', $recipeID, \PDO::PARAM_INT);
    $rs->bindValue(':ingredient', $ingredientID, \PDO::PARAM_INT);
    $rs->bindValue(':quantity', $quantity, \PDO::PARAM_STR);
    
    return $rs->execute();
}

function deleteRecipesHasIngredientsByRecipeId(\PDO $connexion, int $recipeID) 
{
    $sql = "DELETE FROM dishes_has_ingredients
            WHERE dish_id = :recipe;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recipe', $recipeID, \PDO::PARAM_INT);

    return $rs->execute();
}

function deleteOneById(\PDO $connexion, int $recipeID)
{
    $sql = "DELETE FROM dishes
            WHERE id = :recipe;";

    $rs = $connexion->prepare($sql);
    $rs->bindValue(':recipe', $recipeID, \PDO::PARAM_INT);

    return $rs->execute();
}

?>
<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;
    ";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
<?php

namespace App\Models\UsersModel;

function findOneByPseudo(\PDO $connexion, array $data = null)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name
            AND password = :password;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}
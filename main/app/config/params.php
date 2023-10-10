<?php

// Initialisation des zones dynamiques
$title = '';
$content = '';

// Fichiers et Dossiers
define('PUBLIC_FOLDER', 'main');
define('ADMIN_FOLDER', 'admin');
define('DISPATCHER_NAME', 'index.php');

// Paramètres de connexion
define('DB_HOST', '127.0.0.1:3306');
define('DB_NAME', 'recipe_master');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

// Accueil
$baseURL = "http://localhost/script_serveur/year2/recipe_master/main/public/";
// Recettes
$recipesURL = "http://localhost/script_serveur/year2/recipe_master/main/public/recipes";
// Chefs
$chefsURL = "http://localhost/script_serveur/year2/recipe_master/main/public/chefs";
// Login
$loginURL = "http://localhost/script_serveur/year2/recipe_master/main/public/users/login/form";
?>
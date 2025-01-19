<?php

use App\Autoloader;
use App\Database;

require '../app/Autoloader.php';
Autoloader::register();

// Affichage des erreurs php
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", 1);

// Initialisation des objets
$db = new Database('blog_poo_php_db');

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p = 'home';
}

ob_start();

if ($p === 'home') {
    require '../pages/index.php';
}elseif($p === 'single'){
    require '../pages/single.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';
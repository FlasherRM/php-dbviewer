<?php
require_once 'vendor/autoload.php';
require_once 'classes/Database.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$database = new Database();
$databases = $database->getDatabases();

echo $twig->render('databases.html', ['databases' => $databases]);


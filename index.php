<?php
require_once 'vendor/autoload.php';
require_once 'classes/Database.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$message = $_GET['message'];

$database = new Database();
$databases = $database->getDatabases();

echo $twig->render('main.html', ['databases' => $databases, 'message' => $message]);


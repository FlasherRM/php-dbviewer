<?php
require_once 'vendor/autoload.php';
require_once 'classes/Database.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$databaseName = $_GET['name'];

$database = new Database();
$databases = $database->getDatabases();
$tables = $database->getTables($databaseName);

echo $twig->render('database.html', ['database' => $databaseName, 'tables' => $tables, 'databases' => $databases]);


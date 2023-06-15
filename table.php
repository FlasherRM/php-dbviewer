<?php
require_once 'vendor/autoload.php';
require_once 'classes/Database.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$databaseName = $_GET['database']; // Получение имени базы данных из параметра запроса
$tableName = $_GET['table']; // Получение имени таблицы из параметра запроса

$database = new Database();
$table = $database->getTable($databaseName, $tableName);

echo $twig->render('table.html', ['database' => $databaseName, 'table' => $table]);

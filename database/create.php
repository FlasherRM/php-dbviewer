<?php
require_once '../classes/Database.php';
$name = $_GET['name'];

function redirectToMain($error = null) {
    if ($error == null) {
        header('Location: '."http://0.0.0.0:3000?message=successfully");
    } else {
        header('Location: '."http://0.0.0.0:3000?message=exist");
    }

}

$database = new Database();
if ($database->createDatabase($name) == 1) {
    redirectToMain();
} else {
    redirectToMain('exist');
}
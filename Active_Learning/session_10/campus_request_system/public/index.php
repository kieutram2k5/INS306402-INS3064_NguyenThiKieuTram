<?php

require_once __DIR__ . '/../app/Controllers/RequestController.php';

$controller = new RequestController();

$page = $_GET['page'] ?? 'home';

if ($page === 'requests') {
    $controller->index();
} elseif ($page === 'show') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $controller->show($id);
} elseif ($page === 'create') {
    $controller->create();
} else {
    echo "<h1>Hello MVC</h1>";
    echo "<p><a href='?page=requests'>View Requests</a></p>";
    echo "<p><a href='?page=create'>Create Request</a></p>";
}
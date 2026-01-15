<?php

$url = $_GET['url'] ?? '/';

$routes = [

    '/' => ['HomeController', 'index'],
    '/login' => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
    '/logout' => ['AuthController', 'logout'],
];

if (!array_key_exists($url, $routes)) {
    http_response_code(404);
    echo "404 - Page non trouvée";
    exit;
}

[$controllerName, $method] = $routes[$url];

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    die("Méthode $method inexistante");
}

$controller->$method();

<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

$routes = [
    '/' => ['HomeController', 'index'],
    '/login' => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
    '/logout' => ['AuthController', 'logout'],
    '/coach/dashboard' => ['CoachController', 'dashboard'],
];

if (!array_key_exists($uri, $routes)) {
    http_response_code(404);
    echo "404 - Page non trouvée";
    exit;
}

[$controllerName, $method] = $routes[$uri];

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    die("Méthode $method inexistante");
}

$controller->$method();

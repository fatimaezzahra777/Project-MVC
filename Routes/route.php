<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => ['HomeController', 'index'],
    '/login'    => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
    '/logout'   => ['AuthController', 'logout'],
    '/coach/dashboard'  => ['CoachController', 'dashboard'],
    '/coach/profile_c' => ['CoachController', 'profil'],
    '/coach/seance'    => ['CoachController', 'seances'], 
    '/coach/add_seance'=> ['CoachController', 'addSeance'],
    '/coach/reservation'=> ['CoachController', 'reservations'],
    '/sportif/dashboard' => ['SportifController', 'dashboard'],
    '/sportif/seance'    => ['SportifController', 'seances'],
    '/sportif/reserv'    => ['SportifController', 'reservations'],
    

];

if (!array_key_exists($url, $routes)) {
    http_response_code(404);
    echo "404 - Page non trouvée";
    exit;
}

[$controllerName, $method] = $routes[$url];

if (!class_exists($controllerName)) {
    die("Classe $controllerName introuvable !");
}

$controller = new $controllerName();

if (!method_exists($controller, $method)) {
    die("Méthode $method inexistante");
}

$controller->$method();

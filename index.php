<?php
    // инициализация
    define('ROOT_DIR', __DIR__);

    $logPass = require_once(ROOT_DIR . '/config/logPass.php');
    $connection = new PDO($logPass['dsn'], $logPass['username'], $logPass['password']);

    // роут
    $routes = require_once(ROOT_DIR . '/config/routes.php');
    $requestedRoute = explode('?', $_SERVER['REQUEST_URI'])[0] ?? null;
    $requestedMethod = $_SERVER['REQUEST_METHOD'];
    $route = $routes[$requestedRoute] ?? $routes['404'];
    if ($route['handler']) {
        // обработчик
        require_once($route['file']);
    } else {
        //шаблон
        require(ROOT_DIR . '/components/common/header.php');

        require_once($route['file']);

        require(ROOT_DIR . '/components/common/footer.php');
    }


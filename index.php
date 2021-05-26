<?php
    // инициализация
    define('ROOT_DIR', __DIR__);
    require_once(ROOT_DIR . '/config/connection.php');
    // роут
    $routes = require_once(ROOT_DIR . '/config/routes.php');
    $requestedRoute = explode('?', $_SERVER['REQUEST_URI'])[0] ?? null;
//    var_dump($requestedRoute);exit();
    $requestedMethod = $_SERVER['REQUEST_METHOD'];
    $route = $routes[$requestedRoute] ?? $routes['404'];
    if (!empty($route['methods'])) {
        if (!in_array($requestedMethod, $route['methods'])) {
            $route = $routes['404'];
        }
    }
    if ($route['handler']) {
        // обработчик
        require_once($route['file']);
    } else {
        //шаблон
        require(ROOT_DIR . '/components/common/header.php');

        require_once($route['file']);

        require(ROOT_DIR . '/components/common/footer.php');
    }


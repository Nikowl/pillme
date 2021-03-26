<?php
    // инициализация
    define('ROOT_DIR', __DIR__);

    $logPass = require_once(ROOT_DIR.'/config/logPass.php');
    $connection = new PDO($logPass['dsn'], $logPass['username'], $logPass['password']);

    // роут
    $routes = require_once(ROOT_DIR . '/config/routes.php');

    /**
     * TODO: написать парсер строки запроса, чтобы запросы вида
     * TODO: /createProduct?brand=&codeProduct=&name=&amount=&amountUnit=&dosage=&dosageUnit=&serving=&servingUnit=&perDay=&timeOfTaking=
     * TODO: разделялись на роут и парамеры. Проверка маршрутизации должна быть только по роуту.
     * TODO: то есть в примере выше роут это '/createProduct' и он описан в routes.php, а остальное это параметры
     */

    $requestedRoute = explode('?', $_SERVER['REQUEST_URI'])[0] ?? null;
    $route = $routes[$requestedRoute] ?? $routes['404'];

    // шаблон
//    require(ROOT_DIR . '/components/common/header.php');

    require_once ($route);

    require(ROOT_DIR . '/components/common/footer.php');

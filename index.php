<?php
    define('ROOT_DIR', __DIR__);
    $route = require_once(ROOT_DIR . '/config/routeConfig.php');
    require('components/header.php');
    if ($_SERVER['REQUEST_URI'] === '/') {
        try {
            $pdo = require_once(ROOT_DIR . '/connectionDB.php');
        } catch (PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
        $query = $pdo->query('SELECT * FROM products');
        require_once(ROOT_DIR . '/components/gridCards.php');
    } elseif ((array_key_exists($_SERVER['REQUEST_URI'], $route)) || (array_key_exists($_SERVER['REQUEST_URI'] = $_GET['route'] ?? null, $route))) {
        require_once($route[$_SERVER['REQUEST_URI']]);
    } else {
        require(ROOT_DIR . '/404.php');
    }
    require(ROOT_DIR . '/components/footer.php');
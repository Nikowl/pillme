<?php
//    print_r($_REQUEST);die();
    echo '<pre>' . print_r($_SERVER, true) . '</pre>';die();
    define('ROOT_DIR', __DIR__);


    $route = require_once(ROOT_DIR . '/config/routeConfig.php');
    require(ROOT_DIR . '/components/header.php');
    if (!empty($_GET['route']) && array_key_exists($_GET['route'], $route)) {
//            echo count($_GET);
            require ($route[$_GET['route']]);
    } else {
        try {
            $pdo = require_once(ROOT_DIR . '/config/dbConfig.php');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
        $query = $pdo->query('SELECT * FROM products');
        require_once(ROOT_DIR . '/components/gridCards.php');
    }
    require('components/footer.php');
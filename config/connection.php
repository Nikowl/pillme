<?php

    function getConnection(): PDO
    {
        $logPass = require(ROOT_DIR . '/config/logPass.php');
        return new PDO($logPass['dsn'], $logPass['userName'], $logPass['password']);
    }
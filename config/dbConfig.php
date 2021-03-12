<?php
        $logPass = include ('logPass.php');
        return new PDO($logPass['dsn'], $logPass['username'], $logPass['password']);

<?php
        $logPass = include('config/logPass.php');
        return new PDO($logPass['dsn'], $logPass['username'], $logPass['password']);
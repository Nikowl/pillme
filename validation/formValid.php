<?php

    function cleanArray($array = [])
    {
        foreach ($array as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $array[$key] = $value;
        }
        return $array;
    }

    $args = [
        'brand' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'codeProduct' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'amount' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 5000]
        ],
        'dosage' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 5000]
        ],
        'serving' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 5000]
        ],
        'perDay' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 5000]
        ],
        'amountUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'dosageUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'servingUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'timeOfTaking' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ];


    if (!empty($_GET)) {
//        $arrayForm = cleanArray($_GET);
        $myInputs = filter_var_array($_GET, $args);
        if (($myInputs !== false) && (count($myInputs) === count(array_filter($myInputs)))) {
            require('../add/insertDB.php');
        } else {
//            $_GET['route'] = '/addProduct';
            $_SERVER['REQUEST_URI'] = '/addProduct';
            $_GET['attention'] = true;
            $_GET['attentionEmpty'] = '* Заполните обязательные поля';
            /*if (($myInputs === false) && (count($myInputs) !== count(array_filter($myInputs)))) {
            } else {

            }*/

//            $_GET['attentionNotNumber'] = '* Допускаются только целые числа от 1 - 5000';
            require("../index.php");
//            header("Location: /addProduct");
        }
    }


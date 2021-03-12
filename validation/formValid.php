<?php

    function cleanArray($array = array()) {
        foreach ($array as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $array[$key] = $value;
        }
        return $array;
    }

    /*isEmptyValue() Проверяет массив на пустые значения.
    При наличии пустых значений вернет новый массив c значениями равными ключам пустых эдементов переданного массива
    Иначе вернёт false*/
    function isEmptyValue($array = array()) {
        $arrayReturn = array();
        foreach ($array as $key => $value) {
            if (empty($value)) {
                $arrayReturn[] = $key;
            }
            if (!empty($arrayReturn)) {
                return $arrayReturn;
            } else {
                return false;
            }
        }
    }

    if (!empty($_GET)) {
        $arrayForm = cleanArray($_GET);
        if (($emptyValue = isEmptyValue($arrayForm)) === false) {
            require('../add/insertDB.php');
            /*foreach ($arrayForm as $key=>$value) {
                echo $key . " " . $value . '</br>';
            }*/
        } else {
            header("Location: /?route=addProduct");
        }
    }


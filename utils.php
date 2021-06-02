<?php

    function dump(mixed ...$variable)
    {
        foreach ($variable as $var) {
            echo '<pre>';
                var_dump($var);
            echo '</pre>';
        }
            exit();
    }

    function export(...$variable)
    {
        foreach ($variable as $var) {
            echo '<pre>';
            var_export($var);
            echo '</pre>';
        }
        exit();
    }
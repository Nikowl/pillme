<?php
    return [
        "/" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/products/index.php",
            "methods" => ['GET']
        ],
        // Товары
        "/addProduct" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/products/add.php",
            "methods" => ['GET']

        ],
        // TODO: не должен открываться с методом GET (прочитать про ошибка 405)
        // TODO: сейчас обработка происходит в самом файле, а это работа роутера (обработка в index.php)
        //TODO: если не правильный метод, то бросать на 404
        "/createProduct" => [
            "handler" => true,
            "file" => ROOT_DIR . "/components/products/create.php",
            "methods" => ['POST']
        ],


        // Статические страницы
        "404" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/pages/404.php",
            "methods" => ['GET']
        ]
    ];

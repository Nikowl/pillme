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

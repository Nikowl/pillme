<?php
    return [
        "/" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/products/index.php"
        ],
        // Товары
        "/addProduct" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/products/add.php"
        ],
        "/createProduct" => [
            "handler" => true,
            "file" => ROOT_DIR . "/components/products/create.php",
        ],
        "/filters" => [
            "handler" => true,
            "file" => ROOT_DIR . "/components/product/function.php",
        ],

        // Статические страницы
        "404" => [
            "handler" => false,
            "file" => ROOT_DIR . "/components/pages/404.php",
        ]


    ];

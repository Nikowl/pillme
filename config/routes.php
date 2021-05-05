<?php
    // TODO: добавить необязательный параметр method, в котором будет хранится имя http-метода по которому будет открываться данная страница
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
        // TODO: не должен открываться с методом GET
        // TODO: сейчас обработка происходит в самом файле, а это работа роутера
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

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
        // TODO: не должен открываться с методом GET (прочитать про ошибка 405)
        // TODO: сейчас обработка происходит в самом файле, а это работа роутера (обработка в index.php)
        "/createProduct" => [
            "method" => "post",
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

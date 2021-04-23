<?php
    // валидация
    require_once ROOT_DIR.'/validation/product.php';

    $params = $_GET;
    $params = validateProduct($params);
    if (!empty($params['errors'])) {
        header('Location: /addProduct?' . http_build_query(array_merge(['attention' => $params['attention']],['errors' => $params['errors']], $params['input'])));
        exit();
    }

    // вставка в бд
    $sql = '
        INSERT INTO products(brand, codeProduct, createTime, name, amount, amountUnit, dosage, dosageUnit, serving, servingUnit, perDay, timeOfTaking) 
        VALUES (:brand, :codeProduct, CURRENT_TIMESTAMP(),  :name, :amount, :amountUnit, :dosage, :dosageUnit, :serving, :servingUnit, :perDay, :timeOfTaking)
    ';

    /** @var PDO $connection */
    $statement = $connection->prepare($sql);
    $statement->execute([
        'brand' => $params['input']['brand'],
        'codeProduct' => $params['input']['codeProduct'],
        'name' => $params['input']['name'],
        'amount' => $params['input']['amount'],
        'amountUnit' => $params['input']['amountUnit'],
        'dosage' => $params['input']['dosage'],
        'dosageUnit' => $params['input']['dosageUnit'],
        'serving' => $params['input']['serving'],
        'servingUnit' => $params['input']['servingUnit'],
        'perDay' => $params['input']['perDay'],
        'timeOfTaking' => $params['input']['timeOfTaking'],
//        'expirationDate' => $params['expirationDate']
    ]);

    header("Location: /addProduct");

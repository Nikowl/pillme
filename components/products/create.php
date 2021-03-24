<?php
    // валидация
    require_once ROOT_DIR.'/validation/product.php';

    $params = $_GET;
    $params = validateProduct($params);

    if (!empty($params['errors'])) {
        header('Location: /addProduct?'.http_build_query(array_merge(['errors' => $params['errors']], $params['input'])));
    }

    // вставка в бд
    $sql = '
        INSERT INTO products(brand, codeProduct, createTime, name, amount, amountUnit, dosage, dosageUnit, serving, servingUnit, perDay, timeOfTaking) 
        VALUES (:brand, :codeProduct, CURRENT_TIMESTAMP(),  :name, :amount, :amountUnit, :dosage, :dosageUnit, :serving, :servingUnit, :perDay, :timeOfTaking)
    ';

    /** @var PDO $connection */
    $statement = $connection->prepare($sql);
    $statement->execute([
        'brand' => $params['brand'],
        'codeProduct' => $params['codeProduct'],
        'name' => $params['name'],
        'amount' => $params['amount'],
        'amountUnit' => $params['amountUnit'],
        'dosage' => $params['dosage'],
        'dosageUnit' => $params['dosageUnit'],
        'serving' => $params['serving'],
        'servingUnit' => $params['servingUnit'],
        'perDay' => $params['perDay'],
        'timeOfTaking' => $params['timeOfTaking'],
//        'expirationDate' => $params['expirationDate']
    ]);

    header("Location: /addProduct");

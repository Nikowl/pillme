<?php
    // валидация
    require_once ROOT_DIR.'/validation/product.php';
//    var_export($_POST); exit();
    $query = validateCreateProductQuery($_POST);
    $product = $query['input'];

    if (!empty($query['errors'])) {
        header('Location: /addProduct?' . http_build_query(array_merge(['attention' => $query['attention']],['errors' => $query['errors']], $product)));
        exit();
    }

    // вставка в бд
    $sql = '
        INSERT INTO products(brandID, codeProduct, createTime, name, amount, amountUnit, dosage, dosageUnit, serving, servingUnit, perDay, timeOfTaking) 
        VALUES (:brand, :codeProduct, CURRENT_TIMESTAMP(),  :name, :amount, :amountUnit, :dosage, :dosageUnit, :serving, :servingUnit, :perDay, :timeOfTaking)
    ';

    /** @var PDO $connection */
    $statement = $connection->prepare($sql);
    $statement->execute([
        'brand' => $product['brand'],
        'codeProduct' => $product['codeProduct'],
        'name' => $product['name'],
        'amount' => $product['amount'],
        'amountUnit' => $product['amountUnit'],
        'dosage' => $product['dosage'],
        'dosageUnit' => $product['dosageUnit'],
        'serving' => $product['serving'],
        'servingUnit' => $product['servingUnit'],
        'perDay' => $product['perDay'],
        'timeOfTaking' => $product['timeOfTaking'],
//        'expirationDate' => $params['expirationDate']
    ]);

    header("Location: /addProduct");

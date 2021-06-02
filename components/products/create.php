<?php
    // валидация
    require_once ROOT_DIR.'/validation/product.php';
    $query = validateCreateProductQuery($_POST);
    //TODO: написать валидацию для файла
    $fileImg = $_FILES['img'];
    $product = $query['input'];

    if (!empty($query['errors'])) {
        header('Location: /addProduct?' . http_build_query(array_merge(['alert'=>'error'],['errors' => $query['errors']], $product)));
        exit();
    }
    $explodeFileName = explode('.', $fileImg['name']);
    $fileType = $explodeFileName[array_key_last($explodeFileName)];
    $fileName = '/img/products/' . $query['input']['codeProduct'] . '.' . $fileType;
    move_uploaded_file($fileImg['tmp_name'], ROOT_DIR . $fileName);
    // вставка в бд
    $sql = '
        INSERT INTO products(imgURL, brandID, codeProduct, createTime, productName, amount, amountUnit, dosage, dosageUnit, serving, servingUnit, perDay, timeOfTaking) 
        VALUES (:imgURL, :brand, :codeProduct, CURRENT_TIMESTAMP(),  :name, :amount, :amountUnit, :dosage, :dosageUnit, :serving, :servingUnit, :perDay, :timeOfTaking)
    ';

    $statement = getConnection()->prepare($sql);
    $statement->execute([
        'imgURL' => $fileName,
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

    header("Location: /addProduct?" . http_build_query(['alert'=>'success']));

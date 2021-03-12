<?php

    $sql = 'INSERT INTO products(brand, codeProduct, createTime, name, amount, amountUnit, dosage, dosageUnit, serving, servingUnit, perDay, timeOfTaking) VALUES (:brand, :codeProduct, CURRENT_TIMESTAMP(),  :name, :amount, :amountUnit, :dosage, :dosageUnit, :serving, :servingUnit, :perDay, :timeOfTaking)';
    try {
        $pdo = require_once('../config/dbConfig.php');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }
    $query = $pdo->prepare($sql);
    $query->execute([
        'brand' => $arrayForm['brand'],
        'codeProduct' => $arrayForm['codeProduct'],
        'name' => $arrayForm['name'],
        'amount' => $arrayForm['amount'],
        'amountUnit' => $arrayForm['amountUnit'],
        'dosage' => $arrayForm['dosage'],
        'dosageUnit' => $arrayForm['dosageUnit'],
        'serving' => $arrayForm['serving'],
        'servingUnit' => $arrayForm['servingUnit'],
        'perDay' => $arrayForm['perDay'],
        'timeOfTaking' => $arrayForm['timeOfTaking'],
//        'expirationDate' => $arrayForm['expirationDate']
    ]);
    header("Location: /?route=addProduct");

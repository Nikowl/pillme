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
        'brand' => $myInputs['brand'],
        'codeProduct' => $myInputs['codeProduct'],
        'name' => $myInputs['name'],
        'amount' => $myInputs['amount'],
        'amountUnit' => $myInputs['amountUnit'],
        'dosage' => $myInputs['dosage'],
        'dosageUnit' => $myInputs['dosageUnit'],
        'serving' => $myInputs['serving'],
        'servingUnit' => $myInputs['servingUnit'],
        'perDay' => $myInputs['perDay'],
        'timeOfTaking' => $myInputs['timeOfTaking'],
//        'expirationDate' => $myInputs['expirationDate']
    ]);
    header("Location: /?route=addProduct");

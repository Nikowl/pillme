<?php
    /** Функции валидации должны проверить ВЕРНО или НЕ ВЕРНО. Они не должны ни чего менять. */
    /*     * Файл валидации должен содержать только функции для проверки данных. Подключается только там где нужен. */

    function validateCreateProductQuery(array $productData): array
    {
        $validatedData = filter_var_array($productData, getProductValidationRules());
        $errors = checkErrors($validatedData);

        return [
            'input' => $productData,
            'errors' => $errors,
        ];
    }

    function checkErrors(array $arr): array
    {
        $errors = [];
        $deletedEmptyValues = array_filter($arr); //array_filter удаляет пустые значения если не была передана callback-функция
        if (count($arr) !== count($deletedEmptyValues)) //если количетсво элементов в входном массиве не равно количеству элементов в массиве $deleteEmptyValues, значит в входном массиве есть пустые значения
        {
            foreach ($arr as $key => $value) {
                !empty($value) ?: $errors[$key] = 'Заполните данное поле';
            }
        }
        return $errors;
    }

    function getProductValidationRules(): array
    {
        return [
            'brand' => [
                'filter' => FILTER_CALLBACK,
                'options' => "validateBrand"
            ],
            'codeProduct' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'amount' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1, 'max_range' => 5000]
            ],
            'dosage' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1, 'max_range' => 5000]
            ],
            'serving' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1, 'max_range' => 5000]
            ],
            'perDay' => [
                'filter' => FILTER_VALIDATE_INT,
                'options' => ['min_range' => 1, 'max_range' => 5000]
            ],
            'amountUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'dosageUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'servingUnit' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'timeOfTaking' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ];
    }

    function validateBrand(mixed $brand): bool
    {
        $brand = (int)$brand;
        if (!$brand) {
            return false;
        }
        $row = getConnection()->query("SELECT COUNT(1) FROM brands WHERE id = $brand;")->fetchAll(PDO::FETCH_COLUMN);
        if ($row[0] > 0) {
            return $brand;
        }
        return false;
    }

    //TODO: написать функцию и правило проверки уникальность поля Код товара
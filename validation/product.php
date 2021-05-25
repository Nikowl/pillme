<?php
    /** Функции валидации должны проверить ВЕРНО или НЕ ВЕРНО. Они не должны ни чего менять. */
    /*     * Файл валидации должен содержать только функции для проверки данных. Подключается только там где нужен. */

    function validateCreateProductQuery(array $productData): array
    {
        $validatedData = filter_var_array($productData, getProductValidationRules());
//        var_export($validatedData);
        $errors = checkErrors($validatedData);

        return [
            'input' => $productData,
            'errors' => $errors,
            'attention' => "*Числа должны быть в диапазоне от 1 до 5000</br>*Поля не должны быть пустыми",
        ];
    }

    function checkErrors(array $arr): array
    {
        $errors = [];
        if (count($arr) !== count(array_filter($arr))) //TODO: заменить условие проверки. Данная запись сложна для понимания!
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

    function validateBrand(mixed $brandId): bool
    {
        $brandId = (int)$brandId;
        if (!$brandId) {
            return false;
        }
        $row = getConnection()->query("SELECT COUNT(1) FROM brands WHERE id = $brandId;")->fetchAll(PDO::FETCH_COLUMN);
        if ($row[0] > 0) {
            return $brandId;
        }
        return false;
    }
<?php
    /** Функции валидации должны проверить ВЕРНО или НЕ ВЕРНО. Они не должны ни чего менять. */
    /*     * Файл валидации должен содержать только функции для проверки данных. Подключается только там где нужен. */


    function validateProduct(array $params): array
    {
        $input = filter_var_array($params, getProductValidationRules());
//        var_dump($errors= checkEmptyValues($input)) ;
        $errors= checkEmptyValues($input);
        $result = [
            'input' => $params,
            'errors' => $errors,
             'attention' => "*Числа должны быть в диапазоне от 1 до 5000" . "</br>" . "*Поля не должны быть пустыми",
        ];
        return $result;



    }

    function checkEmptyValues(array $arr): array
    {
        $errors = [];
        if (count($arr) !== count(array_filter($arr))) //TODO: заменить условие проверки. Данная запись сложна для понимания!
        {
            foreach ($arr as $key=>$value) {
                !empty($value) ?: $errors[$key] = 'Заполните данное поле';
            }
        }
        return $errors;
    }

    function getProductValidationRules(): array
    {
        return [
            'brand' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
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

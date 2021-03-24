<?php

/**
 * Файл валидации должен содержать только функции для проверки данных. Подключается только там где нужен.
 */

function cleanArray($array = []): array
{
    foreach ($array as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        $array[$key] = $value;
    }

    return $array;
}

function validateProduct(array $params): array
{
//        $input = filter_var_array($params, getProductValidationRules());
    $result = [
        'input' => $params,
        'errors' => [
            'name' => 'Поле обязательно для заполнения'
        ]
    ];

    //TODO: написать проверку обязательности полей. Сейчас пропускает пустые строки.

//        if (($input !== false) && (count($input) === count(array_filter($input)))) {
//
//             успешная валидация?
//            $result['errors'] = [];
//
//            return $result;
//        }

//        $result['errors'] = [
    // тут должен быть список невалидных полей с ошибками
    // 'name' => 'Заполните это поле'
//        ];

    return $result;
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

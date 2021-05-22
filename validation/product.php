<?php
    /** Функции валидации должны проверить ВЕРНО или НЕ ВЕРНО. Они не должны ни чего менять. */
    /*     * Файл валидации должен содержать только функции для проверки данных. Подключается только там где нужен. */

    /** @var PDO $connection */

    function validateCreateProductQuery(array $productData): array
    {
        $validatedData = filter_var_array($productData, getProductValidationRules());

        $errors= checkErrors($validatedData);

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
            foreach ($arr as $key=>$value) {
                !empty($value) ?: $errors[$key] = 'Заполните данное поле';
            }
        }
        return $errors;
    }

    function getProductValidationRules(): array
    {
        return [
            // TODO: с вводом отдельной таблицы для брендов, тут нужно проверить, что переданный ид бренда существует в таблице
            'brand' => [
              'filter'=>FILTER_CALLBACK,
              'options'=>function ($brand) {
                  $logPass = require(ROOT_DIR . '/config/logPass.php');
                  $connection = new PDO($logPass['dsn'], $logPass['username'], $logPass['password']);
                  require_once(ROOT_DIR . '/components/products/function.php');
                  $brands = getBrands($connection);
                  foreach ($brands as $b) {
                      if ($b->brandID === $brand) {
                          return $brand;
                          exit();
                      }
                  }
                  return null;
              }
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

    function isBrand($brand)
    {
        $brands = getBrands($connection);
        foreach ($brands as $b) {
            if ($b->brandID === $brand) {
                return $brand;
                exit();
            }
        }
        return null;
    }

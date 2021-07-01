<?php
    function getCount(PDO $connection, array $filters = []): int
    {
        $filtersQuery = prepareFiltersQuery($filters);
        return $connection->query("SELECT COUNT(1) FROM products $filtersQuery;")->fetchColumn();
    }

    function prepareFiltersQuery(array $filters = []): ?string
    {
        $values = [];
        $prepareQuery = [];
        foreach ($filters as $filter => $valueFilter) {
            if (!empty($valueFilter) && is_array($valueFilter)) {
                foreach ($valueFilter as $v) {
                    $values[] = $filter . " LIKE '%" . addslashes($v) . "%'";
                }
                $prepareQuery[] = '(' . implode(' OR ', $values) . ')';
            } elseif (!empty($valueFilter)) {
                $prepareQuery[] = '(' . $filter . " LIKE '%" . addslashes($valueFilter) . "%'" . ')';
            }

        }
        if (empty($prepareQuery)) {
            return null;
        }
        //TODO Добавить экранирование спец символов
        return ' WHERE ' . implode(' AND ', $prepareQuery) . ' ';
    }

    function getAmountPages(PDO $connection, array $filters = [], $limit = 12): int
    {
        $amountColumn = getCount($connection, $filters);
        return ceil($amountColumn / $limit);
    }

    function getOffset($page = 2, $limit = 12): int
    {
        return $limit * ($page - 1);
    }

    function getProducts(PDO $connection, int $page = 1, array $filters = [], int $limit = 12): array
    {
        $offset = getOffset($page, $limit);
        $filtersQuery = prepareFiltersQuery($filters);

        // TODO: по идее, эта функция должна возвращать массив товаров как есть.
        // TODO: ты тут подцепляешь бренды, чтобы красиво отобразить название бренда в списке
        // TODO: пока можно оставить так, так как у тебя мало где используется эта функция и всего 1 джоин
        // TODO: не может явно понять откуда взять столбец name в условии WHERE алиас не работает. Времено изменил поле name в таблице products на productName
        return $connection->query("SELECT p.*,  b.id as brandID, b.name as brandName FROM products as p INNER JOIN brands as b ON p.brandID = b.id $filtersQuery ORDER BY createTime DESC LIMIT $limit OFFSET $offset;")->fetchAll(PDO::FETCH_OBJ);
    }

    function getOneProduct(PDO $connection, int $id): array
    {
        return $connection->query("SELECT * FROM products WHERE productID = $id;")->fetchAll(PDO::FETCH_OBJ);
    }

    function getBrands(PDO $connection): array
    {
        return $connection->query("SELECT id as brandID , name as brandName  FROM brands;")->fetchAll(PDO::FETCH_OBJ);
    }

    function normalizeProductsQuery(array $params): array
    {
        $correctParams = [
            'page' => 1,
            'filters' => [
                'brandID' => [],
                'productName' => ''
            ]
        ];
        $cleanedParams = array_intersect_key($params, $correctParams); // Чистим массив от некорректных значений. Возвращает только те элементы $params, которые есть в массиве $validateParams
        if (array_key_exists('filters', $cleanedParams)) {
            $cleanedParams['filters'] = array_intersect_key($cleanedParams['filters'],$correctParams['filters']);
        }

        return $cleanedParams;
    }

    function normalizePage(mixed $page, int $amountPage): int {
        $page = (int)$page;
        if (!$page || $page > $amountPage || $page < $amountPage) {
            $page = 1;
        }
        return $page;
    }

    function getUnits(): array
    {
        return ['мг', 'мл', 'шт', 'капсулы', 'капли'];
    }



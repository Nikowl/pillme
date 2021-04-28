<?php


    function getCount(PDO $connection, array $filters = []): int
    {
        $filtersQuery = prepareFiltersQuery($filters);
        return $connection->query("SELECT COUNT(1) FROM products $filtersQuery;")->fetchColumn();
    }

    function prepareFiltersQuery(array $filters = []): ?string
    {
        if (empty($filters)) {
            return null;
        }
        $values = [];
        $s1 = [];
        foreach ($filters as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $v) {
                    $values[] = $key . "='" . addslashes($v) . "'";
                }
                $s1[] = '(' . implode(' OR ', $values) . ')';
            } else {
                if (!empty($value)) {
                    $s1[] = $key . "='" . addslashes($value) . "'";
                }
            }

        }
        return ' WHERE ' . implode(' AND ', $s1);

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

    /**
     * @param PDO $connection
     * @param array $arr
     * @return stdClass[]
     */
//    function getProducts(PDO $connection, array $arr = []): array
    function getProducts(PDO $connection, int $page = 1, array $filters = [], int $limit = 12)
    {
        $offset = getOffset($page, $limit);
        $filtersQuery = prepareFiltersQuery($filters);
        return $connection->query("SELECT * FROM products $filtersQuery LIMIT $limit OFFSET $offset;")->fetchAll(PDO::FETCH_OBJ);

    }

    function getUnits()
    {
        return [];
    }
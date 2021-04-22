<?php


    function getCount(PDO $connection, array $filters = []): int
    {
        $filtersQuery = prepareFiltersQuery($connection, $filters);
        var_dump($filtersQuery); echo '</br>';
        $count = $connection->query("SELECT COUNT(1) FROM products $filtersQuery;")->fetchColumn();
        var_dump($count);
        return $count;
    }

    function prepareFiltersQuery(PDO $connection, array $filters = []): string
    {
        $queryStr = '';
        if (!empty($filters)) {
            $values = [];
            $s = [];
            foreach ($filters as $key => $val) {
                foreach ($filters["$key"] as $value) {
                    $values[] = "'" . addslashes($value) . "'";
                }
                $s[] = ' WHERE ' . $key . ' IN ' . '(' . implode(',', $values) . ')';
            }
            $queryStr = implode('OR', $s);
        }
        return $queryStr;
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
        $filtersQuery = prepareFiltersQuery($connection, $filters);
        return $connection->query("SELECT * FROM products $filtersQuery LIMIT $limit OFFSET $offset;")->fetchAll(PDO::FETCH_OBJ);

    }

    function getUnits()
    {
        return [];
    }
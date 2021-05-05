<?php


    function getCount(PDO $connection, array $filters = []): int
    {
        $filtersQuery = prepareFiltersQuery($filters);
        return $connection->query("SELECT COUNT(1) FROM products $filtersQuery;")->fetchColumn();
    }

    function prepareFiltersQuery(array $filters = []): ?string
    {
        /*if (empty($filters)) {
            return null;
        }*/
        $values = [];
        $prepareQuery = [];
        foreach ($filters as $filter => $valueFilter) {
            if (is_array($valueFilter)) {
                foreach ($valueFilter as $v) {
                    $values[] = $filter . " LIKE '%" . addslashes($v) . "%'";
                }
                $prepareQuery[] = '(' . implode(' OR ', $values) . ')';
            } elseif (!empty($valueFilter)) {
                $prepareQuery[] = $filter . " LIKE '%" . addslashes($valueFilter) . "%'";
            }

        }
        if (empty($prepareQuery)) {
            return null;
        }
        return ' WHERE ' . implode(' AND ', $prepareQuery);

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
        return $connection->query("SELECT * FROM products INNER JOIN brands ON products.brand = brands.brandID $filtersQuery LIMIT $limit OFFSET $offset;")->fetchAll(PDO::FETCH_OBJ);

    }

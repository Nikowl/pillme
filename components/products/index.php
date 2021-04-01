<?php
    /** @var PDO $connection */
    /** @var int $limitProductsOnPage */
    $params = require_once(ROOT_DIR . '../config/params.php');
    $amountColumn = $connection->query('SELECT COUNT(1) FROM products')->fetchColumn(); // количество записей в таблице
    $limit = $params['limitProductsOnPage'];
    $amountPages = (int)ceil($amountColumn / $limit); // количество страниц
    $page = (int)($_GET['page'] ?? 1); // номер страницы TODO: Есть косяк, если значение больше количества страниц. Выведет пустую страницу.
    $offset = $params['limitProductsOnPage'] * ($page - 1);
    $products = $connection->query("SELECT * FROM products LIMIT $limit  OFFSET $offset;")->fetchAll(PDO::FETCH_OBJ);
?>

<section class="bg-light">
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card h-100">
                        <figure class="figure pt-4 px-4">
                            <img src="<?= $product->imgURL ?>" class="card-img-top"
                                 alt="<?= $product->codeProduct ?>">
                            <figcaption class="figure-caption text-end">
                                <small><?= $product->codeProduct ?></small></figcaption>
                        </figure>
                        <div class="card-body pt-0">
                            <h5
                                    class="card-title"><?= $product->name, " ", $product->dosage, $product->dosageUnit, ", ", $product->amount, $product->amountUnit ?></h5>
                            <p class="card-text my-0"><small
                                        class="text-muted"><b>Производитель: </b> <?= $product->brand ?></small></p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-sm mt-2" type="button">Добавить в график
                                    приёма
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <nav class="my-5" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($page !== 1): ?>
                <li class="page-item">
                    <a class="page-link" href="/?page=<?= $page - 1 ?>">Назад</a>
                </li>
                <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Назад</a>
                </li>
                <?php endif; ?>
                <?php for ((int)$i = 1; $i <= $amountPages; $i++): ?>
                    <?php if ($i === $page): ?>
                        <li class="page-item active"><a class="page-link" href="/?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php else: ?>
                        <li class="page-item"><a class="page-link" href="/?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($page !== $amountPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="/?page=<?= $page + 1 ?>">Вперёд</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Вперёд</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</section>

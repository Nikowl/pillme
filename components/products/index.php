<?php
    /** @var PDO $connection */
    /** @var int $limitProductsOnPage */
    $arrayGet = $_GET;
    require_once(ROOT_DIR . '/components/products/function.php');
//    getCount($connection, $arrayGet['filters'] ?? []);
    $amountPages = getAmountPages($connection, $arrayGet['filters'] ?? []);
    $page = $arrayGet['page'] ?? 1; // номер страницы TODO: Есть косяк, если значение больше количества страниц. Выведет пустую страницу.
    $products = getProducts($connection, $page, $arrayGet['filters'] ?? []);
    $brandsFilter = $connection->query("SELECT brand FROM products GROUP BY brand;")->fetchAll(PDO::FETCH_OBJ);
?>

<section class="">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <form class="h-25 overflow-auto" action="/" method="get" id="filtersForm">
                    <fieldset>
                        <div>
                            <legend>Бренд</legend>
                            <?php foreach ($brandsFilter as $brands): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filters[brand][]"
                                           value="<?= $brands->brand ?>" id="<?= $brands->brand ?>">
                                    <label class="form-check-label" for="<?= $brands->brand ?>">
                                        <?= $brands->brand ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
<!--                            <input type="hidden" name="filters" value=true>-->
                        </div>
                    </fieldset>
                    <!--                    </div>-->

                </form>
                <div class="row mt-2">
                    <div class="col-6 d-grid">
                        <button type="reset" class="btn btn-sm btn-primary btn-block" form="filtersForm">Сбросить
                        </button>
                    </div>
                    <div class="col-6 d-grid">
                        <button type="submit" class="btn btn-sm btn-success btn-block" form="filtersForm">Применить
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
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
                                            class="card-title h-50"><?= $product->name, " ", $product->dosage, $product->dosageUnit, ", ", $product->amount, $product->amountUnit ?></h5>
                                    <p class="card-text my-0"><small
                                                class="text-muted"><b>Производитель: </b> <?= $product->brand ?></small>
                                    </p>


                                </div>
                                <div class="d-grid gap-2 card-footer bg-success text-white">
                                    <!--                                    <small class="text-muted">Last updated 3 mins ago</small>-->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="<?= $product->codeProduct ?>">
                                        <label class="form-check-label" for="<?= $product->codeProduct ?>">
                                            Добавить в график
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="col px-5">
                <div class="row g-4">
                    <button type="submit" class="btn btn-primary">Сформировать график</button>
                </div>
            </div>
        </div>
        <div class="row">
            <nav class="my-5" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php if ($page !== 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="/?page=<?= 1 ?>">&laquo;&laquo;</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">&laquo;&laquo;</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($page !== 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="/?page=<?= 1 ?>">Назад</a>
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
                    <?php if ($page !== $amountPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="/?page=<?= $amountPages ?>">&raquo;&raquo;</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">&raquo;&raquo;</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

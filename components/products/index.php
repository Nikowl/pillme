<?php
    /** @var PDO $connection */
    /** @var int $limitProductsOnPage */
    $arrayGet = $_GET;
    var_export($arrayGet);
//    var_dump($arrayGet['filters']['name']);
    require_once(ROOT_DIR . '/components/products/function.php');
    $amountPages = getAmountPages($connection, $arrayGet['filters'] ?? []);
    $page = (int)($arrayGet['page'] ?? 1); // номер страницы TODO: Есть косяк, если значение больше количества страниц. Выведет пустую страницу.
    $products = getProducts($connection, $page, $arrayGet['filters'] ?? []);
    $brandsFilter = $connection->query("SELECT brand FROM products GROUP BY brand;")->fetchAll(PDO::FETCH_OBJ);
?>
<section class="">
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <span class="h5">Производитель</span>
                <form class="h-25 overflow-auto border rounded px-2" action="/" method="get" id="filtersForm">
                    <fieldset>
                        <div>
                            <?php foreach ($brandsFilter as $brands): ?>
                                <div class="form-check">
                                    <?php if (!empty($arrayGet['filters']['brand']) && in_array($brands->brand,
                                            $arrayGet['filters']['brand'])): ?>
                                        <input class="form-check-input" type="checkbox" name="filters[brand][]"
                                               value="<?= $brands->brand ?>" id="<?= $brands->brand ?>" checked>
                                    <?php else: ?>
                                        <input class="form-check-input" type="checkbox" name="filters[brand][]"
                                               value="<?= $brands->brand ?>" id="<?= $brands->brand ?>">
                                    <?php endif; ?>
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
                    <div class="col-12 d-grid my-2">
                        <input type="text" class="form-control" value="<?= $arrayGet['filters']['name'] ?? '' ?>" placeholder="Наименование" form="filtersForm" name="filters[name]"  autocomplete="off">
                    </div>
                    <div class="col-6 d-grid my-2">
                        <button  type="reset" class="btn btn-sm btn-secondary btn-block" form="filtersForm">Сбросить
                        </button>
                    </div>
                    <div class="col-6 d-grid my-2">
                        <button type="submit" class="btn btn-sm btn-primary btn-block" form="filtersForm">Применить
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
                            <a class="page-link" href="<?= '/?' . http_build_query(array_merge($arrayGet, ['page'=>1])) ?>">&laquo;&laquo;</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">&laquo;&laquo;</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($page !== 1): ?>
                        <li class="page-item">
                            <?php $arrayGet['page'] = $page - 1 ?>
                            <a class="page-link" href="<?= '/?' . http_build_query($arrayGet) ?>">Назад</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Назад</a>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $amountPages; $i++): ?>
                        <?php if ($i === $page): ?>
                            <li class="page-item active"><a class="page-link" href="#"><?= $i ?></a></li>
                        <?php else: ?>
                            <?php $arrayGet['page'] = $i ?>
                            <li class="page-item"><a class="page-link"
                                                     href=" <?= '/?' . http_build_query($arrayGet) ?>"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($page !== $amountPages): ?>
                        <li class="page-item">
                            <?php $arrayGet['page'] = $page + 1 ?>
                            <a class="page-link" href="<?= '/?' . http_build_query($arrayGet) ?>">Вперёд</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Вперёд</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($page !== $amountPages): ?>
                        <li class="page-item">
                            <?php $arrayGet['page'] = $amountPages ?>
                            <a class="page-link" href="<?= '/?' . http_build_query($arrayGet) ?>">&raquo;&raquo;</a>
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

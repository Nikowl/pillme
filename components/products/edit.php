<?php

    require_once(ROOT_DIR . '/components/products/function.php');
    $connection = getConnection();
    $query = $_GET;
    $product = getOneProduct($connection, $query['productID'])[0];
    $brands = getBrands($connection);
    $units = getUnits();
?>

<section>
    <div class="container py-5">

        <form action="/updateProduct" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $product->productID ?>" name="productID">
            <div class="row g-2 mb-2 px-1 col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" type="file" id="formFile" name="img" autocomplete="off">
            </div>
            <div class="row g-2 mb-2 px-1 form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <select name="brand" class="form-select <?= empty($query['errors']['brand']) ?: 'alert-danger' ?>"
                        id="brand"
                        aria-label="Floating label select example" autocomplete="off">
                    <option selected></option>
                    <?php foreach ($brands as $brand): ?>
                        <?php if ($brand->brandID === $product->brandID && empty($query['errors']['brand'])): ?>
                            <option selected value="<?= $product->brandID ?>"><?= $brand->brandName ?></option>
                        <?php else: ?>
                            <option value="<?= $product->brandID ?>"><?= $brand->brandName ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <label for="brand">Производитель</label>
            </div>
            <div class="row g-2 mb-2 px-1 form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <input type="text" name="codeProduct"
                       class="form-control <?= empty($query['errors']['codeProduct']) ?: 'alert-danger' ?>" id="codeProduct"
                       placeholder="" autocomplete="off"
                       value="<?= !empty($query['errors']['codeProduct']) ? '' : $product->codeProduct ?>">
                <label for="codeProduct">Код продукта</label>
            </div>
            <div class="row g-2 mb-2 px-1 form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <input type="text" name="name"
                       class="form-control <?= empty($query['errors']['name']) ?: 'alert-danger' ?>" id="name"
                       placeholder="" autocomplete="off"
                       value="<?= !empty($query['errors']['name']) ? '' : $product->productName ?>">
                <label for="name">Название</label>
            </div>

            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="amount"
                           class="form-control <?= empty($query['errors']['amount']) ?: 'alert-danger' ?>" id="amount"
                           placeholder=""
                           autocomplete="off" value="<?= !empty($query['errors']['amount']) ? '' : $product->amount ?>">
                    <label for="amount">Количество</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="amountUnit"
                            class="form-select <?= empty($query['errors']['amountUnit']) ?: 'alert-danger' ?>" id="amountUnit"
                            aria-label="Floating label select example" autocomplete="off">
                        <option selected></option>
                        <?php foreach ($units as $unit): ?>
                            <?php if ($unit === $product->amountUnit && empty($query['errors']['amountUnit'])): ?>
                                <option selected value="<?= $unit ?>"><?= $unit ?></option>
                            <?php else: ?>
                                <option value="<?= $unit ?>"><?= $unit ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="amountUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="dosage"
                           class="form-control <?= empty($query['errors']['dosage']) ?: 'alert-danger' ?>" id="dosage"
                           placeholder=""
                           autocomplete="off" value="<?= !empty($query['errors']['dosage']) ? '' : $product->dosage ?>">
                    <label for="dosage">Дозировка</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="dosageUnit"
                            class="form-select <?= empty($query['errors']['dosageUnit']) ?: 'alert-danger' ?>" id="dosageUnit"
                            aria-label="Floating label select example" autocomplete="off">
                        <option selected></option>
                        <?php foreach ($units as $unit): ?>
                            <?php if ($unit === $product->dosageUnit && empty($query['errors']['dosageUnit'])): ?>
                                <option selected value="<?= $unit ?>"><?= $unit ?></option>
                            <?php else: ?>
                                <option value="<?= $unit ?>"><?= $unit ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="dosageUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="serving"
                           class="form-control <?= empty($query['errors']['serving']) ?: 'alert-danger' ?>" id="serving"
                           placeholder=""
                           autocomplete="off" value="<?= !empty($query['errors']['serving']) ? '' : $product->serving ?>">
                    <label for="serving">Порция</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="servingUnit"
                            class="form-select <?= empty($query['errors']['servingUnit']) ?: 'alert-danger' ?>"
                            id="servingUnit"
                            aria-label="Floating label select example" autocomplete="off">
                        <option selected></option>
                        <?php foreach ($units as $unit): ?>
                            <?php if ($unit === $product->servingUnit && empty($query['errors']['servingUnit'])): ?>
                                <option selected value="<?= $unit ?>"><?= $unit ?></option>
                            <?php else: ?>
                                <option value="<?= $unit ?>"><?= $unit ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="servingUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="perDay"
                           class="form-control <?= empty($query['errors']['perDay']) ?: 'alert-danger' ?>" id="perDay"
                           placeholder=""
                           autocomplete="off" value="<?= !empty($query['errors']['perDay']) ? '' : $product->perDay ?>">
                    <label for="perDay">Приёмы</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="timeOfTaking"
                            class="form-select <?= empty($query['errors']['timeOfTaking']) ?: 'alert-danger' ?>"
                            id="timeOfTaking"
                            aria-label="Floating label select example" autocomplete="off">
                        <option selected></option>
                        <option <?= ($product->timeOfTaking !== 'Натощак' || !empty($query['errors']['timeOfTaking'])) ?: ' selected ' ?>value="Натощак">Натощак</option>
                        <option <?= ($product->timeOfTaking !== 'Во время еды' || !empty($query['errors']['timeOfTaking'])) ?: ' selected ' ?>value="Во время еды">Во время еды</option>
                        <option <?= ($product->timeOfTaking !== 'Между приёмами пищи' || !empty($query['errors']['timeOfTaking'])) ?: ' selected ' ?>value="Между приёмами пищи">Между приёмами пищи</option>
                    </select>
                    <label for="timeOfTaking">Время приёма</label>
                </div>
            </div>
            <div class="row g-2 text-danger col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <p><?= $query['attention'] ?? "" ?></p>
            </div>
            <div class="row g-2">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 d-grid gap-2">
                    <a class="btn btn-primary" href="/addProduct" role="button">Сбросить</a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 d-grid gap-2">
                    <button type="submit" class="btn btn-success">Обновить</button>
                </div>
            </div>
        </form>
        <?php if (!empty($query['alert']) && $query['alert'] === 'success'): ?>
            <div class="row g-2 my-2 px-1 form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4"">
                    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                        <strong>Успешно. </strong> Новая запись добавлена.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            </div>
        <?php endif; ?>
        <?php if (!empty($query['alert']) && $query['alert'] === 'error'): ?>
            <div class="row g-2 my-2 px-1 form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                        <strong>Ошибка! </strong> Не корректные данные.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
    // TODO: см. замечание в кипе про префиксы колонок в таблице

    /** @var PDO $connection */
    $brands = $connection->query("SELECT id as brandID,name as brandName FROM brands;")->fetchAll(PDO::FETCH_OBJ);

    $query = $_GET;
?>

<section class="bg-light">
    <div class="container py-5">
        <form action="/createProduct" method="post">
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <select name="brand" class="form-select" id="brand"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($query['errors']['brand']) ?: 'border: 1px solid red' ?>">
                        <option selected></option>
                        <?php foreach ($brands as $brand): ?>
                            <?php if (!empty($query['brand']) && $brand->brandID ===
                                    $query['brand']): ?>
                                <option selected value="<?= $brand->brandID ?>"><?= $brand->brandName ?></option>
                            <?php else: ?>
                                <option value="<?= $brand->brandID ?>"><?= $brand->brandName ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="brand">Производитель</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <input type="text" name="codeProduct" class="form-control" id="codeProduct"
                           placeholder="<?= $query['errors']['codeProduct'] ?? "codeProduct" ?>" autocomplete="off"
                           value="<?= $query['codeProduct'] ?? "" ?>"
                           style="<?= empty($query['errors']['codeProduct']) ?: 'border: 1px solid red' ?>">
                    <label for="codeProduct">Код продукта</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="<?= $query['errors']['name'] ?? "name" ?>" autocomplete="off"
                           value="<?= $query['name'] ?? "" ?>"
                           style="<?= empty($query['errors']['name']) ?: 'border: 1px solid red' ?>">
                    <label for="name">Название</label>
                    <!--                    <small class="text-danger">-->
                    <? //=$_GET['errors']['name'] ?? null?><!--</small>-->
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="amount" class="form-control" id="amount" placeholder=""
                           autocomplete="off" value="<?= $query['amount'] ?? "" ?>"
                           style="<?= empty($query['errors']['amount']) ?: 'border: 1px solid red' ?>">
                    <label for="amount">Количество</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="amountUnit" class="form-select" id="amountUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($query['errors']['amountUnit']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $query['amountUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="amountUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="dosage" class="form-control" id="dosage" placeholder=""
                           autocomplete="off" value="<?= $query['dosage'] ?? "" ?>"
                           style="<?= empty($query['errors']['dosage']) ?: 'border: 1px solid red' ?>">
                    <label for="dosage">Дозировка</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="dosageUnit" class="form-select" id="dosageUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($query['errors']['dosageUnit']) ?: 'border: 1px solid red' ?>">
<!--                      TODO: утащить единицы измерения в функцию -->
                        <option selected><?= $query['dosageUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="dosageUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="serving" class="form-control" id="serving" placeholder=""
                           autocomplete="off" value="<?= $query['serving'] ?? "" ?>"
                           style="<?= empty($query['errors']['serving']) ?: 'border: 1px solid red' ?>">
                    <label for="serving">Порция</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="servingUnit" class="form-select" id="servingUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($query['errors']['servingUnit']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $query['servingUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="servingUnit">ЕИ</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="perDay" class="form-control" id="perDay" placeholder=""
                           autocomplete="off" value="<?= $query['perDay'] ?? "" ?>"
                           style="<?= empty($query['errors']['perDay']) ?: 'border: 1px solid red' ?>">
                    <label for="perDay">Приёмы</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="timeOfTaking" class="form-select" id="timeOfTaking"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($query['errors']['timeOfTaking']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $query['timeOfTaking'] ?? "" ?></option>
                        <option value="Натощак">Натощак</option>
                        <option value="Во время еды">Во время еды</option>
                        <option value="Между приёмами пищи">Между приёмами пищи</option>
                    </select>
                    <label for="timeOfTaking">Время приёма</label>
                </div>
            </div>
            <div class="row g-2 text-danger col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <p><?= $query['attention'] ?? "" ?></p>
            </div>
            <div class="row g-2">
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 d-grid gap-2">
                    <button type="reset" class="btn btn-primary">Сбросить</button>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 d-grid gap-2">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </div>
        </form>
    </div>
</section>

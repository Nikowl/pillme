<?php
    $param = $_GET;
    //    print_r(var_dump($param));exit();
?>

<section class="bg-light">
    <div class="container py-5">
        <form action="/createProduct" method="get">
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <input type="text" name="brand" class="form-control" id="brand"
                           placeholder="<?= $param['errors']['brand'] ?? "brand" ?>"
                           autocomplete="off" value="<?= $param['brand'] ?? "" ?>"
                           style="<?= empty($param['errors']['brand']) ?: 'border: 1px solid red' ?>">
                    <label for="brand">Производитель</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <input type="text" name="codeProduct" class="form-control" id="codeProduct"
                           placeholder="<?= $param['errors']['codeProduct'] ?? "codeProduct" ?>" autocomplete="off"
                           value="<?= $param['codeProduct'] ?? "" ?>"
                           style="<?= empty($param['errors']['codeProduct']) ?: 'border: 1px solid red' ?>">
                    <label for="codeProduct">Код продукта</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-12 col-md-8 col-lg-6 col-xl-4">
                    <input type="text" name="name" class="form-control" id="name"
                           placeholder="<?= $param['errors']['name'] ?? "name" ?>" autocomplete="off"
                           value="<?= $param['name'] ?? "" ?>"
                           style="<?= empty($param['errors']['name']) ?: 'border: 1px solid red' ?>">
                    <label for="name">Название</label>
                    <!--                    <small class="text-danger">-->
                    <? //=$_GET['errors']['name'] ?? null?><!--</small>-->
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <input type="number" name="amount" class="form-control" id="amount" placeholder=""
                           autocomplete="off" value="<?= $param['amount'] ?? "" ?>"
                           style="<?= empty($param['errors']['amount']) ?: 'border: 1px solid red' ?>">
                    <label for="amount">Количество</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="amountUnit" class="form-select" id="amountUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($param['errors']['amountUnit']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $param['amountUnit'] ?? "" ?></option>
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
                           autocomplete="off" value="<?= $param['dosage'] ?? "" ?>"
                           style="<?= empty($param['errors']['dosage']) ?: 'border: 1px solid red' ?>">
                    <label for="dosage">Дозировка</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="dosageUnit" class="form-select" id="dosageUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($param['errors']['dosageUnit']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $param['dosageUnit'] ?? "" ?></option>
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
                           autocomplete="off" value="<?= $param['serving'] ?? "" ?>"
                           style="<?= empty($param['errors']['serving']) ?: 'border: 1px solid red' ?>">
                    <label for="serving">Порция</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="servingUnit" class="form-select" id="servingUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($param['errors']['servingUnit']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $param['servingUnit'] ?? "" ?></option>
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
                           autocomplete="off" value="<?= $param['perDay'] ?? "" ?>"
                           style="<?= empty($param['errors']['perDay']) ?: 'border: 1px solid red' ?>">
                    <label for="perDay">Приёмы</label>
                </div>
                <div class="form-floating col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <select name="timeOfTaking" class="form-select" id="timeOfTaking"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= empty($param['errors']['timeOfTaking']) ?: 'border: 1px solid red' ?>">
                        <option selected><?= $param['timeOfTaking'] ?? "" ?></option>
                        <option value="Натощак">Натощак</option>
                        <option value="Во время еды">Во время еды</option>
                        <option value="Между приёмами пищи">Между приёмами пищи</option>
                    </select>
                    <label for="timeOfTaking">Время приёма</label>
                </div>
            </div>
            <div class="row g-2 text-danger col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <p><?= $param['attention'] ?? "" ?></p>
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

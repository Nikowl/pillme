<?//= $_SERVER['REQUEST_URI'] . '</br>'?>
<?//= $_SERVER['SCRIPT_FILENAME']?>
<section class="bg-light">
    <div class="container py-5">
        <?php $param = $_GET ?>
        <form action="<?php ROOT_DIR ?>/validation/formValid.php" method="get">
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="brand" class="form-control" id="brand" placeholder="brand"
                           autocomplete="off" value="<?= $param['brand'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['brand'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="brand">Производитель</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="codeProduct" class="form-control" id="codeProduct"
                           placeholder="codeProduct" autocomplete="off" value="<?= $param['codeProduct'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['codeProduct'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="codeProduct">Код продукта</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" autocomplete="off"
                           value="<?= $param['name'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['name'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="name">Название</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-2">
                    <input type="number" name="amount" class="form-control" id="amount" placeholder=""
                           autocomplete="off" value="<?= $param['amount'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['amount'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="amount">Количество</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="amountUnit" class="form-select" id="amountUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= (!empty($param['attention'])) && (empty($param['amountUnit'])) ? 'border: 1px solid red' : "" ?>">
                        <option selected><?= $param['amountUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="amountUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-2">
                    <input type="number" name="dosage" min="1" max="5000" class="form-control" id="dosage" placeholder=""
                           autocomplete="off" value="<?= $param['dosage'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['dosage'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="dosage">Дозировка</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="dosageUnit" class="form-select" id="dosageUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= (!empty($param['attention'])) && (empty($param['dosageUnit'])) ? 'border: 1px solid red' : "" ?>">
                        <option selected><?= $param['dosageUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="dosageUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-2">
                    <input type="number" name="serving" min="1" max="5000" class="form-control" id="serving" placeholder=""
                           autocomplete="off" value="<?= $param['serving'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['serving'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="serving">Порция</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="servingUnit" class="form-select" id="servingUnit"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= (!empty($param['attention'])) && (empty($param['servingUnit'])) ? 'border: 1px solid red' : "" ?>">
                        <option selected><?= $param['servingUnit'] ?? "" ?></option>
                        <option value="шт">шт</option>
                        <option value="капли">капли</option>
                        <option value="капсулы">капсулы</option>
                        <option value="мл">мл</option>
                        <option value="мг">мг</option>
                    </select>
                    <label for="servingUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-2">
                    <input type="number" name="perDay" min="1" max="5000" class="form-control" id="perDay" placeholder=""
                           autocomplete="off" value="<?= $param['perDay'] ?? "" ?>"
                           style="<?= (!empty($param['attention'])) && (empty($param['perDay'])) ? 'border: 1px solid red' : "" ?>">
                    <label for="perDay">Приёмы</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="timeOfTaking" class="form-select" id="timeOfTaking"
                            aria-label="Floating label select example" autocomplete="off"
                            style="<?= (!empty($param['attention'])) && (empty($param['timeOfTaking'])) ? 'border: 1px solid red' : "" ?>">
                        <option selected><?= $param['timeOfTaking'] ?? "" ?></option>
                        <option value="Натощак">Натощак</option>
                        <option value="Во время еды">Во время еды</option>
                        <option value="Между приёмами пищи">Между приёмами пищи</option>
                    </select>
                    <label for="timeOfTaking">Время приёма</label>
                </div>
            </div>
            <?php if (!empty($param['attentionEmpty'])) : ?>
                <div class="row g-2 mb-2 text-danger">
                    <div class="form-floating col-md-4">
                        <p><?= $param['attentionEmpty'] ?></p>
                    </div>
                </div>
            <?php endif ?>
            <?php if (!empty($param['attentionNotNumber'])) : ?>
                <div class="row g-2 mb-2 text-danger">
                    <div class="form-floating col-md-4">
                        <p><?= $param['attentionNotNumber'] ?></p>
                    </div>
                </div>
            <?php endif ?>
            <div class="row g-2">
                <div class="col-md-2 d-grid gap-2">
                    <button type="reset" class="btn btn-primary">Сбросить</button>
                </div>
                <div class="col-md-2 d-grid gap-2">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </div>
        </form>
    </div>
</section>

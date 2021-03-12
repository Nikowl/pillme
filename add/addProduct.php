<section class="pg-light">
    <div class="container py-5">
        <form action="<?php ROOT_DIR ?>/validation/formValid.php" method="get" onsubmit="window.location.reload()">
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="brand" class="form-control" id="brand" placeholder="brand" autocomplete="off">
                    <label for="brand">Производитель</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="codeProduct" class="form-control" id="codeProduct" placeholder="codeProducts" autocomplete="off">
                    <label for="codeProduct">Код продукта</label>
                </div>
            </div>
            <div class="row g-2 mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" autocomplete="off">
                    <label for="name">Название</label>
                </div>
            </div>

            <!--<div class="mb-3">
                                <label for="formFileLg" class="form-label"></label>
                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
            </div>-->
            <div class="row g-2 mb-3">
                <div class="form-floating col-md-2">
                    <input type="number" name="amount" min="0" class="form-control" id="amount" placeholder="" autocomplete="off">
                    <label for="amount">Количество</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="amountUnit" class="form-select" id="amountUnit" aria-label="Floating label select example" autocomplete="off">
                        <option selected>штуки (шт)</option>
                        <option value="1">капли</option>
                        <option value="2">капсулы</option>
                        <option value="3">милилитры (мл)</option>
                        <option value="4">милиграммы(мг)</option>
                    </select>
                    <label for="amountUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="form-floating col-md-2">
                    <input type="number" name="dosage" min="0" class="form-control" id="dosage" placeholder="" autocomplete="off">
                    <label for="dosage">Дозировка</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="dosageUnit" class="form-select" id="dosageUnit" aria-label="Floating label select example" autocomplete="off">
                        <option selected>штуки (шт)</option>
                        <option value="1">капли</option>
                        <option value="2">капсулы</option>
                        <option value="3">милилитры (мл)</option>
                        <option value="4">милиграммы(мг)</option>
                    </select>
                    <label for="dosageUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="form-floating col-md-2">
                    <input type="number" name="serving" min="0" class="form-control" id="serving" placeholder="" autocomplete="off">
                    <label for="serving">Порция</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="servingUnit" class="form-select" id="servingUnit" aria-label="Floating label select example" autocomplete="off">
                        <option selected>штуки (шт)</option>
                        <option value="1">капли</option>
                        <option value="2">капсулы</option>
                        <option value="3">милилитры (мл)</option>
                        <option value="4">милиграммы(мг)</option>
                    </select>
                    <label for="servingUnit">Единицы измерения</label>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="form-floating col-md-2">
                    <input type="number" name="perDay" min="0" class="form-control" id="perDay" placeholder="" autocomplete="off">
                    <label for="perDay">Приёмы</label>
                </div>
                <div class="form-floating col-md-2">
                    <select name="timeOfTaking" class="form-select" id="timeOfTaking" aria-label="Floating label select example" autocomplete="off">
                        <option selected>Натощак</option>
                        <option value="1">Во время еды</option>
                        <option value="2">Между едой</option>
                        <option value="3">Между едой</option>
                        <!--                        <option value="4">мг</option>-->
                    </select>
                    <label for="timeOfTaking">Время приёма</label>
                </div>
            </div>
            <!--<div class="row g-2 mb-3">
                <div class="form-floating col-md-2">
                    <input type="date" name="expirationDate" min="0" class="form-control" id="expirationDate" placeholder="">
                    <label for="expirationDate">Срок годности</label>
                </div>
            </div>-->
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

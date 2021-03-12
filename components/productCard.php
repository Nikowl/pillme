<div class="col">
    <div class="card h-100">
        <figure class="figure pt-4 px-4">
            <img src="<?= $row->imgURL ?>" class="card-img-top" alt="<?= $row->codeProduct ?>">
            <figcaption class="figure-caption text-end"><small><?= $row->codeProduct ?></small></figcaption>
        </figure>
        <div class="card-body pt-0">
            <h5 class="card-title"><?= $row->name, " ", $row->dosage, $row->dosageUnit, ", ", $row->amount, $row->amountUnit ?></h5>
            <p class="card-text my-0"><small class="text-muted"><b>Производитель: </b> <?= $row->brand ?></small></p>
            <p class="card-text my-0"><small class="text-muted"><b>Срок годности: </b> <?= $row->codeProduct ?></small></p>
            <div class="d-grid gap-2">
                <button class="btn btn-success btn-sm mt-2" type="button">Добавить в график приёма</button>
            </div>
        </div>
    </div>
</div>
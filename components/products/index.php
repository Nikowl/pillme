<?php
/** @var PDO $connection */
$products = $connection->query('SELECT * FROM products;')->fetchAll(PDO::FETCH_OBJ);
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
  </div>
</section>

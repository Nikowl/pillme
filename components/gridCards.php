<section class="bg-light">
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php while($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
                <?php include('productCard.php'); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
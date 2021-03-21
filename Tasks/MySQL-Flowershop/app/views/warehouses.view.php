<?php require 'partials/header.php' ?>

<h2>Warehouses</h2>

<ul>
    <?php foreach ($warehouses as $warehouse) : ?>
        <li><?= $warehouse ?></li>
    <?php endforeach; ?>
</ul>

<?php require 'partials/footer.php' ?>
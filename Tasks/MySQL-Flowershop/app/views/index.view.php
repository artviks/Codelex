<?php require 'partials/header.php' ?>

<h2>Flower Shop</h2>
<table style="width:250px">
    <tr>
        <th>Flower</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>
    <?php foreach ($flowers as $flower) : ?>
        <tr>
            <td><?= $flower->name() ?></td>
            <td><?= $flower->amount() ?></td>
            <td><?= $flower->price() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require 'partials/footer.php' ?>
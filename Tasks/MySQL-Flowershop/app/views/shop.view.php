<?php require 'partials/header.php' ?>

<h2>SHOP</h2>

<p>Gender: </p>

<form method="POST" action="/shop">
    <input type="submit" value="Male" name="gender">
    <input type="submit" value="Female" name="gender">
</form>

<table>
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

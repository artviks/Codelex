

<html lang="en">
<body>

<h2>Garage</h2>

<table style="width:250px">
    <tr>
        <th>Name</th>
        <th>Model</th>
        <th>Price</th>
        <th>Fuel Consumption</th>
        <th>Status</th>
    </tr>
    <?php foreach ($table as $car) : ?>
        <tr>
            <td><?= $car['name'] ?></td>
            <td><?= $car['model'] ?></td>
            <td><?= $car['fuelConsumption'] ?></td>
            <td><?= $car['price'] ?></td>
            <td><?= $car['status'] ?></td>
            <td>
                <form method="POST" action="index.php">
                    <input type="submit" value="rent" name=<?= $car["id"]?>>
                </form>
            </td>
            <td>
                <form method="POST" action="index.php">
                    <input type="submit" value="return" name=<?= $car["id"]?>>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
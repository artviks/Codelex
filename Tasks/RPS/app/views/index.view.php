<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RPS</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <h1>RPS</h1>

    <form method="POST" action="index.php">

        <?php foreach ($elements->collection() as $i => $element) : ?>

            <input type="radio"
                   id=<?= $element->name() ?>
                   name="element"
                   value=<?= $i ?>>

            <label for=<?= $element->name() ?>>
                <?= $element->name() ?>
            </label>

        <?php endforeach; ?>

        <br>
        <input class="button" type="submit" value="PLAY">
    </form>

    <?php if(isset($results)) : ?>

    <p>Player: <?= $game->getUser()->name() ?></p>
    <p>Computer: <?= $game->getComputer()->name() ?></p>
    <p class="results">Results: <?= $results ?></p>

    <?php endif; ?>

</body>

</html>
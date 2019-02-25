<?php
    include('url.php');
    include('get.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokemon Searcher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
</head>
<body>
    <form action="" method="get">
        <input type="text" name="pokemon" placeholder="Search a Pokemon">
        <input value="Search" type="submit">
    </form>
    <form action="" method="get">
        <label for="displayed">Display 200 Pokemon until : </label>
        <input type="number" name="displayed" placeholder="Example : 600">
        <input value="Set" type="submit">
    </form>
    <div class="list-pokemon">
    <?php foreach($pokemon as $_pokemon): ?>
        <div class="list-item-pokemon">
            <p><?= pokemonId($_pokemon->name, 1)?></p>
            <div class="sprites-container">
                <img class="sprite sprite-0" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                <img class="sprite sprite-1" style="display:none" src="<?= pokemonSprite($_pokemon->name, 2, 1)?>">
            </div>
            <p><?= $_pokemon->name ?></p>
        </div>
    <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
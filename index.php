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
    <form class="search" action="" method="get">
        <label for="pokemon">Search a Pokemon by name or by ID : </label><br />
        <input class="inputs" type="text" name="pokemon" placeholder="Search a Pokemon">
        <input class="submits" value="Search" type="submit">
    </form>
    <form  class="display" action="" method="get">
        <label for="displayed">Display 200 Pokemon until : </label><br />
        <input class="inputs" type="number" name="displayed" placeholder="Between 0 and 1000">
        <input class="submits" value="Set" type="submit">
    </form>
    <div class="list-pokemon">
        <?php if(!empty($_GET['pokemon']) && $error === 0): ?>
        <div class="list-item-pokemon red">
            <button>View</button>
            <p><?= pokemonId($searchedPokemon, 1)?></p>
            <div class="sprites-container">
                <img alt="Front Sprite Not Available" class="sprite sprite-0" src="<?= pokemonSprite($searchedPokemon, 2, 0)?>">
                <img alt="Back Sprite Not Available" class="sprite sprite-1" style="display:none" src="<?= pokemonSprite($searchedPokemon, 2, 1)?>">
            </div>
            <p><?= pokemonName($searchedPokemon, 1) ?></p>
        </div>
        <?php endif; ?>
        <?php foreach($pokemon as $_pokemon): ?>
        <div class="list-item-pokemon">
                <button>View</button>
                <p><?= pokemonId($_pokemon->name, 1)?></p>
                <div class="sprites-container">
                    <img alt="Front Sprite Not available" class="sprite sprite-0" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                    <img alt="Back Sprite Not available" class="sprite sprite-1" style="display:none" src="<?= pokemonSprite($_pokemon->name, 2, 1)?>">
                </div>
                <p><?= $_pokemon->name ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
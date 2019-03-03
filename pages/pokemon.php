<?php

    include('../ressources/url.php');
    include('../ressources/get.php');

    $pkm = $_GET['view'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ucfirst(pokemonName($pkm, 1))?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/style.css">
    <link rel="icon" type="image/png" href="<?= pokemonSprite($pkm, 1, 0, false)?>" />
</head>
<body class="pokemon">
    <div class="container">
        <div class="fiche">
            <div class="sprites-container">
                <img alt="Front Sprite Not available" class="sprite sprite-0" src="<?= pokemonSprite($pkm, 2, 0, false)?>">
                <img alt="Back Sprite Not available" class="sprite sprite-1" style="display:none" src="<?= pokemonSprite($pkm, 2, 1, false)?>">
            </div>
            <div class="infos">
                <div class="name"><strong>Name : </strong><?= ucfirst(pokemonName($pkm, 2))?></div>
                <div class="type"><strong>Type(s) :</strong><?php getResults($pkm, 2);
                $pokemonTypes = $results[1]->types;
                foreach($pokemonTypes as $_type):?>
                        <?= ucfirst($_type->type->name) ?>
                <?php endforeach; ?></div>
                <div class="desc"><strong>Description :</strong> <?= pokemonDesc($pkm, 1)?></div>
            </div>
            <div class="sprites-container">
                <img alt="Front Sprite Not available" class="sprite sprite-0" src="<?= pokemonSprite($pkm, 2, 0, true)?>">
                <img alt="Back Sprite Not available" class="sprite sprite-1" style="display:none" src="<?= pokemonSprite($pkm, 2, 1, true)?>">
            </div>
        </div>
        <div class="mesures">
            <div class="weight"><strong>Weight : </strong><?= pokemonMesure($pkm, 1, 'weight')?> kg</div>
            <div class="height"><strong>Height : </strong><?= pokemonMesure($pkm, 1, 'height')?> m</div>
            <div class="height"><strong>Shape : </strong><?= ucfirst(pokemonShape($pkm, 1))?> </div>
        </div> 
        <div class="stats">
            <h2>Base stats :</h2>
            <?php getResults($pkm, 3);
            $pokemonStats = $results[3]->stats;
            foreach($pokemonStats as $_stats): ?>
                <div class="stat"><strong><?= ucfirst($_stats->stat->name)?> : </strong><?= $_stats->base_stat?></div>
            <?php endforeach ?>
        </div>
    </div>
    <script src="../script.js"></script>
</body>
</html>
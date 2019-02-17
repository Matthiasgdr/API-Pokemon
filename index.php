<?php
    include('urls.php');
    
    echo '<pre>';
    print_r($results);
    echo '</pre>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokemon Searcher</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <form action="#" method="get">
        <input type="text" name="pokemon" placeholder="Search a Pokemon">
        <input value="Search" type="submit">
    </form>
    <?php foreach($results as $_pokemon): ?>
        <div><?= $_pokemon->name ?></div>
    <?php endforeach; ?>

    <script src="script.js"></script>
</body>
</html>
<?php

function pokemonSprite($pokemonName, $index, $side)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    if($side===0){
         $pokemonSprite = $results[$index]->sprites->front_default;
    }
    else{
        $pokemonSprite = $results[$index]->sprites->back_default;

    }
    return $pokemonSprite;
}

// Function created id pokemon
function pokemonId($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    $pokemonId = $results[$index]->id;
    return $pokemonId;
}

function pokemonName($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    $pokemonNick = $results[$index]->name;
    return $pokemonNick;
}

$searchedPokemon = empty($_GET['pokemon']) ? '' : strtolower($_GET['pokemon']);
$error = 0;

function unknown_name(){
    echo 'Pokemon Inconnu';
    $error = 1;
    exit();
}

set_error_handler('unknown_name')

?>

<?php

// Get all sprites

function pokemonSprite($pokemonName, $index, $side, $shiney)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
    if(!$shiney){
        if($side===0){
            $pokemonSprite = $results[$index]->sprites->front_default;
       }
       else{
           $pokemonSprite = $results[$index]->sprites->back_default;
       }
    }
    else{
        if($side===0){
            $pokemonSprite = $results[$index]->sprites->front_shiny;
       }
       else{
           $pokemonSprite = $results[$index]->sprites->back_shiny;
       }
    }
    
    return $pokemonSprite;
}

// Get english description

function pokemonDesc($pokemonName, $index)
{
    global $results;

    createPokemonSpeciesUrl($pokemonName, $index);
    $count = 0;
    while($results[$index]->flavor_text_entries[$count]->language->name !== 'en'){
        $count++;
    }
    $pokemonDesc = $results[$index]->flavor_text_entries[$count]->flavor_text;

    return $pokemonDesc;
}
function pokemonShape($pokemonName, $index)
{
    global $results;

    createPokemonSpeciesUrl($pokemonName, $index);

    $pokemonShape = $results[$index]->shape->name;
   
    return $pokemonShape;
}

// Get general results

function getResults($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);
}

// Get Mesures 

function pokemonMesure($pokemonName, $index, $mesure)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    $pokemonMesure = $results[$index]->$mesure;
    return $pokemonMesure/10;
}



// Created pokemon ID
function pokemonId($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    set_error_handler('error');

    $pokemonId = $results[$index]->id;
    return $pokemonId;
}

// Create pokemon Name
function pokemonName($pokemonName, $index)
{
    global $results;

    createPokemonUrl($pokemonName, $index);

    set_error_handler('error');

    $pokemonNick = $results[$index]->name;
    return $pokemonNick;
}

$searchedPokemon = empty($_GET['pokemon']) ? '' : strtolower($_GET['pokemon']);
$error = 0;

function error(){
    echo 'Inconnu';
    $error = 1;
    exit();
}

 

?>

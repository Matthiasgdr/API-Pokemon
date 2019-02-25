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

function search($getPokemon, $pokemonName){
    global $results;

    $search = empty($_GET['search']) ? '' : $_GET['search'];
    if (empty($_GET['search'])) 
    {
        $searchState = 0;
        
    }
    else {
        $searchState = 1;
    };
    
}


?>

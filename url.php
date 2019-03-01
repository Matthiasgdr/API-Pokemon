<?php

    // How many pokemon to display

    if(empty($_GET['displayed']) || $_GET['displayed'] < 200){
        $offset = 0;
    }
    else {
        $offset = $_GET['displayed'] - 200;
    };
    $limit = empty($_GET['displayed']) ? 40 : $_GET['displayed'] - $offset;

    // Create API Url
    $pokemonListUrl = 'https://pokeapi.co/api/v2/pokemon?';
    $pokemonListUrl .= http_build_query([
        'offset' => $offset,
        'limit' => $limit,
    ]);
    
    
    // Curling Urls
    function createUrl($url, $index)
    {
        global $results;

        // Create cache info
        $cacheKey = md5($url);
        $cachePath = './cache/'.$cacheKey;
        $cachePath2 = '../cache/'.$cacheKey;
        $cacheUsed = false;

        // Cache available
        if(file_exists($cachePath))
        {
            $results[$index] = file_get_contents($cachePath);
            $cacheUsed = true;
        }
        // Cache not available
        else
        {
            // Make request to API
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            $results[$index] = curl_exec($curl);
            curl_close($curl);

            // Save in cache
            file_put_contents($cachePath || $cachePath2, $results[$index]);
        }

        // Decode JSON
        $results[$index] = json_decode($results[$index]);
    };

    // Function created pokemon links
    function createPokemonUrl($pokemonName, $index)
    {
        global $results;
        // Create API pokemon url to curl it
        $pokemonUrl = 'https://pokeapi.co/api/v2/pokemon/';
        $pokemonUrl .= $pokemonName;
       // Let's curl this new url !
        createUrl($pokemonUrl, $index);
    }
   
    createUrl($pokemonListUrl, 0);
    $pokemon = $results[0]->results;
?>
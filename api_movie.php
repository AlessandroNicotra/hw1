<?php
    $search = $_GET['search'];
    $type = $_GET['t'];

    if($type == 'cerca'){
        $page = $_GET['p'];
        $curl = curl_init();

        $url = "http://www.omdbapi.com/?apikey=870862df&s=" . $search ."&type=movie&page=" . $page;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        echo($resp);
    }
    else if($type == 'risultato'){
        $curl = curl_init();

        $url = "http://www.omdbapi.com/?apikey=870862df&i=" . $search . "&plot=full";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        echo($resp);
    }
?>



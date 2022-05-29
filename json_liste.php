<?php
    require_once('config.php');
    $cookie = $_COOKIE["hw1_id"];
    $type = $_GET['type'];
    $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
    $result = mysqli_fetch_assoc($query);
    if(($result['n']) != 0){
        if($type == 'visto' && (($query = $connessione->query("SELECT IMDBid, titolo, poster  FROM "  . $cookie . " WHERE visto = 1"))) != false){
            $array = array();
            while($result = mysqli_fetch_assoc($query)){
                $array[] = $result;
            }
            echo(json_encode($array));
        }
        if($type == 'piace' && (($query = $connessione->query("SELECT IMDBid, titolo, poster  FROM "  . $cookie . " WHERE piace = 1"))) != false){
            $array = array();
            while($result = mysqli_fetch_assoc($query)){
                $array[] = $result;
            }
            echo(json_encode($array));
        }

        if($type == 'watch' && (($query = $connessione->query("SELECT IMDBid, titolo, poster  FROM "  . $cookie . " WHERE watchlist = 1"))) != false){
            $array = array();
            while($result = mysqli_fetch_assoc($query)){
                $array[] = $result;
            }
            echo(json_encode($array));
        }
        if($type == 'fav' && ($query = $connessione->query("SELECT preferito  FROM utenti WHERE id = '$cookie'"))){
            $result = mysqli_fetch_assoc($query);
            echo(json_encode($result));
        }
    }
    else if(($result['n']) == 0){
        $array = [];
        echo(json_encode($array));
    }
?>

<?php
    require_once('config.php');
    $cookie = $_COOKIE["hw1_id"];
    $id = $_GET['id'];
    $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
    $result = mysqli_fetch_assoc($query);
    if(($result['n']) != 0){
        if(($query = $connessione->query("SELECT rating  FROM "  . $cookie . " WHERE IMDBid = '$id'")) != false){
            $array = array();
            while($result = mysqli_fetch_assoc($query)){
                $array = $result;
            }
            echo(json_encode($array));
        }
    }
?>

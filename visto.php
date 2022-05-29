<?php
    require_once('config.php');
    $type = $_GET['t'];
    $id = $_GET['id'];
    $cookie = strval($_COOKIE["hw1_id"]);
    if($type == "visto"){
        $poster = $_GET['poster'];
        $titolo = $_GET['titolo'];
        $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
        $result = mysqli_fetch_assoc($query);
        echo $result['n'] . "\n";
        if(($result['n']) == 0){
            $sql1 = "CREATE TABLE  " . $cookie . "  ( IMDBid varchar(255) PRIMARY KEY,
                                                 titolo varchar(255),
                                                 poster varchar(255), 
                                                 visto boolean,
                                                 piace boolean,
                                                 watchlist boolean,
                                                 rating INT(1))";
            $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo', 
                                                     '$poster', 
                                                     true,
                                                     false,
                                                     false,
                                                     0)";
            $connessione->query($sql1);
            $connessione->query($sql2);
        }
        else{
            $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
            $result = mysqli_fetch_assoc($query);
            if(($result['n']) == 0){
                $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo',    
                                                     '$poster', 
                                                     true,
                                                     false,
                                                     false,
                                                     0)";
                $connessione->query($sql2);
            }
            else{
                $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                $result = mysqli_fetch_assoc($query);
                if($result['visto'] == true){
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET visto = false WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                }
                else{
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET visto = true WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                }
            }
        }
    }
    else if($type == "like"){
        $poster = $_GET['poster'];
        $titolo = $_GET['titolo'];
        echo("S\n");
        $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
        $result = mysqli_fetch_assoc($query);
        if(($result['n']) == 0){
            $sql1 = "CREATE TABLE  " . $cookie . "  ( IMDBid varchar(255) PRIMARY KEY,
                                                 titolo varchar(255),
                                                 poster varchar(255), 
                                                 visto boolean,
                                                 piace boolean,
                                                 watchlist boolean,
                                                 rating INT(1))";
            $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo', 
                                                     '$poster', 
                                                     false,
                                                     true,
                                                     false,
                                                     0)";
            $connessione->query($sql1);
            $connessione->query($sql2);
        }
        else{
            $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
            $result = mysqli_fetch_assoc($query);
            if(($result['n']) == 0){
                $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo',    
                                                     '$poster', 
                                                     false,
                                                     true,
                                                     false,
                                                     0)";
                $connessione->query($sql2);
            }
            else{
                echo("A\n");
                $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                $result = mysqli_fetch_assoc($query);
                if($result['piace'] == true){
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET piace = false WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                    echo("B\n");
                }
                else{
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET piace = true WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                    echo("C\n");
                }
            }
        }
    }
    else if($type == "watchlist"){
        $poster = $_GET['poster'];
        $titolo = $_GET['titolo'];
        $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
        $result = mysqli_fetch_assoc($query);
        if(($result['n']) == 0){
            $sql1 = "CREATE TABLE  " . $cookie . "  ( IMDBid varchar(255) PRIMARY KEY,
                                                 titolo varchar(255),
                                                 poster varchar(255), 
                                                 visto boolean,
                                                 piace boolean,
                                                 watchlist boolean,
                                                 rating INT(1))";
            $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo', 
                                                     '$poster', 
                                                     false,
                                                     false,
                                                     true,
                                                     0)";
            $connessione->query($sql1);
            $connessione->query($sql2);
        }
        else{
            $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
            $result = mysqli_fetch_assoc($query);
            if(($result['n']) == 0){
                $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo',    
                                                     '$poster', 
                                                     false,
                                                     false,
                                                     true,
                                                     0)";
                $connessione->query($sql2);
            }
            else{
                $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                $result = mysqli_fetch_assoc($query);
                if($result['watchlist'] == true){
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET watchlist = false WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                }
                else{
                    $sql2 = $connessione->query("UPDATE " . $cookie . " SET watchlist = true WHERE IMDBid = '$id'");
                    $connessione->query($sql2);
                }
            }
        }
    }
    else if($type == "rate"){
        $poster = $_GET['poster'];
        $titolo = $_GET['titolo'];
        $rating = $_GET['rating'];
        $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
        $result = mysqli_fetch_assoc($query);
        if(($result['n']) == 0){
            $sql1 = "CREATE TABLE  " . $cookie . "  ( IMDBid varchar(255) PRIMARY KEY,
                                                 titolo varchar(255),
                                                 poster varchar(255), 
                                                 visto boolean,
                                                 piace boolean,
                                                 watchlist boolean,
                                                 rating INT(1))";
            $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo', 
                                                     '$poster', 
                                                     false,
                                                     false,
                                                     false,
                                                     0)";
            $connessione->query($sql1);
            $connessione->query($sql2);
        }
        else{
            $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
            $result = mysqli_fetch_assoc($query);
            if(($result['n']) == 0){
                $sql2 = "INSERT INTO " . $cookie . " VALUES ('$id',
                                                     '$titolo',    
                                                     '$poster', 
                                                     true,
                                                     false,
                                                     false,
                                                     '$rating')";
                $connessione->query($sql2);
            }
            else{
                $sql2 = $connessione->query("UPDATE " . $cookie . " SET rating = '$rating' WHERE IMDBid = '$id'");
                $connessione->query($sql2);
            }
        }
    }
    else if($type == "ratel"){
        $rating = $_GET['rating'];
        $sql2 = $connessione->query("UPDATE " . $cookie . " SET rating = '$rating' WHERE IMDBid = '$id'");
        $connessione->query($sql2);
    }
?>
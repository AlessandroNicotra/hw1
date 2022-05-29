<?php
    $host = 'localhost';
    $user = '';
    $password = '';
    $db = 'hw1';

    $connessione = new mysqli($host, $user, $password, $db);

    if ($connessione === false){
        die("Errore di connessione: " . $connessione->connect_error);
    }
?>

<?php
    require_once('config.php');
    $cookie = $_COOKIE["hw1_id"];
    $id = $_GET['id'];

    $query = $connessione->query("UPDATE utenti SET preferito = '$id' WHERE id = '$cookie'");
?>

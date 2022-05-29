<?php
    require_once('config.php');

    $username = $connessione->real_escape_string($_POST['user']);
    $password = $connessione->real_escape_string($_POST['pass']);

    $sql = "SELECT id, password FROM utenti WHERE '$username' = user";


    if(($query = $connessione->query($sql)) !== false){
        $result = mysqli_fetch_assoc($query);
        if(password_verify($password, $result['password'])){
            $id = $result['id'];
            setcookie("hw1_id", $id, time()+1000);
            header("Location: index.php");
        }
        else{
            header("Location: index.php?e=login");
        }
    }
    else{
        header("Location: index.php?e=login");
    }
?>

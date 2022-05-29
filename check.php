<?php
    require_once('config.php');
    $type = $_GET['t'];
    $str = $_GET['q'];
    $response = '';

    if($type == "user"){
        $query = $connessione->query("SELECT count(user) as n FROM utenti WHERE user = '$str'");
        $result = mysqli_fetch_assoc($query);
        if(mb_strlen($str) < 4){
            $response = "L'username deve avere almeno 4 caratteri";
        }
        else if($result['n'] == 0){
            $response = "Username disponibile";
        }
        else $response = "Username non disponibile";

        echo $response;
    }
    else if($type == "email"){
        if(filter_var($str, FILTER_VALIDATE_EMAIL)){
            $query = $connessione->query("SELECT count(email) as n FROM utenti WHERE user = '$str'");
            $result = mysqli_fetch_assoc($query);
            if($result['n'] == 0){
                $response = "Email disponibile";
            }
            else $response = "Email già usata";

            echo $response;
        }
        else{
            $response = "Email non valida";
            echo $response;
        }
    }

?>

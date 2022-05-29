<?php
    require_once('config.php');

    $bytes = random_bytes(20);
    $id = bin2hex($bytes);
    $email = $connessione->real_escape_string($_POST['email']);
    $username = $connessione->real_escape_string($_POST['user']);
    $pass = $connessione->real_escape_string($_POST['pass']);
    if(mb_strlen($pass) < 8){
        header("Location: index.php?e=register");
    }
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        header("Location: index.php?e=register");
    }
    $password = password_hash($connessione->real_escape_string($_POST['pass']), PASSWORD_BCRYPT);

    $sql = "INSERT INTO utenti (id, email, user, password) VALUE ('$id', '$email', '$username', '$password')";

    if($connessione->query($sql) === true){
        $query = $connessione->query("SELECT id FROM utenti WHERE user = '$username'");
        $result = mysqli_fetch_assoc($query);
        $id = $result['id'];
        setcookie("hw1_id", $id, time()+1000);
        header("Location: index.php");
    }
    else{
        header("Location: index.php?e=register");
    }
?>

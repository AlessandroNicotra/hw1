<?php
    if(isset($_COOKIE["hw1_id"])){
        require_once('config.php');
        $cookie = $_COOKIE["hw1_id"];
        $fav = false;
        $query = $connessione->query("SELECT preferito  FROM utenti WHERE id = '$cookie'");
        $preferito = mysqli_fetch_assoc($query);
        $id = $preferito['preferito'];
        if($id != null){
            $query = $connessione->query("SELECT IMDBid, titolo, poster  FROM " . $cookie . " WHERE IMDBid = '$id'");
            $fav = mysqli_fetch_assoc($query);
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width = device-width, minimum-scale=1">
            <link rel="stylesheet" href="index.css"/>
            <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
            <script src="home.js" defer="true"></script>
            <title>HW1</title>
        </head>
        <body>
        <nav>
            <a href="index.php" id="logo">HW1</a>
            <form action="search.php">
                <input type="text" name="cerca" placeholder="Cerca un film">
                <input type="submit" value="CERCA">
            </form>
        </nav>

        <div class="wrapper">
            <div id="profilo">
                <div class="back">
                    <p class="back">></p>
                </div>
                <p class="text">Benvenuto <?php
                    $query = $connessione->query("SELECT user FROM utenti WHERE id = '$cookie'");
                    $result_u = mysqli_fetch_assoc($query);
                    echo($result_u['user']) ;
                    ?>!</p>
                <?php
                    if($fav == false){?>
                        <a href="preferito.php" class="add_fav">AGGIUNGI UN FILM PREFERITO ></a>

                    <?php }
                    else{
                ?>
                <p class="text">Film Preferito: <?php echo($fav['titolo']) ?></p>
                <div class="locandina_p">
                    <a href = "result.php?film=<?php echo($fav['IMDBid']) ?>"></a>
                    <?php
                    if($fav['poster'] == 'N/A'){
                    ?>
                    <p><?php echo($fav['titolo']) ?></p>
                    <?php }
                    else{?>
                    <img src='<?php echo($fav['poster']) ?>'>
                    <?php } ?>
                </div>
                <a href="preferito.php?type=fav" class="add_fav">CAMBIA PREFERITO ></a>
                <?php } ?>
                <p class="logout">LOGOUT</p>
            </div>

            <div id="aggiunti">
                <div class="menu">
                    <div class="d_menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <span>PREFERITO</span>
                </div>
                <div class="like">
                    <a href="lista.php?type=piace" class="lista">Film piaciuti ></a>
                    <p class="new">Nessun Film aggiunto a questa lista</p>
                    <div class="locandine">
                        <div class="locandina" id="film_1">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_2">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_3">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_4">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_5">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="visti">
                    <a href="lista.php?type=visto" class="lista">Film visti ></a>
                    <p class="new">Nessun Film aggiunto a questa lista</p>
                    <div class="locandine">
                        <div class="locandina" id="film_1">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_2">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_3">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_4">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_5">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="" >&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="">&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5" title="">&#9734;</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="watch">
                    <a href="lista.php?type=watch" class="lista">Watchlist ></a>
                    <p class="new">Nessun Film aggiunto a questa lista</p>
                    <div class="locandine">
                        <div class="locandina" id="film_1">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_2">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_3">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_4">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                        <div class="locandina" id="film_5">
                            <a href = ""></a>
                            <img src="">
                            <p class="titolo"></p>
                            <div class="rating_overlay">
                                <span class="stella" id="1" title="a">&#9734;</span>
                                <span class="stella" id="2" title="">&#9734;</span>
                                <span class="stella" id="3" title="" >&#9734;</span>
                                <span class="stella" id="4" title="">&#9734;</span>
                                <span class="stella" id="5"  title="">&#9734;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
    <?php }
    else{?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, minimum-scale=1">
    <link rel="stylesheet" href="login.css"/>
    <script src="login.js" defer="true"></script>
    <script src="index.js" defer="true"></script>
    <title>Title</title>
</head>
<body>
    <div class="no_session">
        <div id="button">
            <a href="index.php" id="logo">HW1</a>
            <p><?php if(isset($_GET['e'])){
                    if($_GET['e'] == "login") echo "Errore Login";
                    else if($_GET['e'] == "register") echo "Errore Registrazione";
                }?></p>
            <button class="log">ACCEDI</button>
            <button class="reg">REGISTRATI</button>
        </div>

        <form class="registra" action="register.php" id="registra" method="post">
            <nav>
                <a href="index.php" id="logo">HW1</a>
                <p>REGISTRAZIONE</p>
            </nav>
            <wrap>
                <input class="user_log" type="text" placeholder="Utente" name="user" id="user">
                <p id="user_check"></p>
                <input class="email_log" type="text" placeholder="Email" name="email" id="email">
                <p id="email_check"></p>
                <input type="password" placeholder="Password" name="pass" id="pass">
                <input type="password" placeholder="Conferma Password" id="conpass">
                <input type="submit" value="REGISTRATI" class="invalidf" id="submit_r" disabled>
                <div id="password">
                    <strong>La password deve contenere:</strong>
                    <p id="car">- 8 caratteri</p>
                    <p id="mai">- Una lettera maiuscola</p>
                    <p id="min">- Una lettera minuscola</p>
                    <p id="num">- Un numero</p>
                    <p id="spe">- Un carattere speciale</p>
                </div>
                <div id="account">
                    <p id="log">Hai già un account? Clicca qui!</p>
                </div>
            </wrap>
        </form>

        <form action="login.php" class="login" method="post">
            <nav>
                <a href="index.php" id="logo">HW1</a>
                <p>LOGIN</p>
            </nav>
            <input type="text" placeholder="Utente" name="user" id="user">
            <input type="password" placeholder="Password" name="pass" id="pass">
            <input type="submit" value="ACCEDI">
            <div id="account">
                <p id="reg">Non hai un account? Clicca qui!</p>
            </div>
        </form>

    </div>
</body>
</html>
    <?php }
?>



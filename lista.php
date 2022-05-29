<?php if(isset($_COOKIE["hw1_id"])){ ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, minimum-scale=1">
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="search.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="lista.js" defer="true"></script>
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

<div id="wrapper">
    <h1><?php
        if($_GET['type'] == 'watch') echo("WATCHLIST");
        if($_GET['type'] == 'piace') echo("FILM PIACIUTI");
        if($_GET['type'] == 'visto') echo("FILM VISTI");
        if($_GET['type'] == 'fav') echo("AGGIUNGI PREFERITO");
        ?></h1>
    <div id="risultati">
        <h1 id="errore"> ERRORE RICERCA</h1>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
        <div class="risultato">
            <a href = ""></a>
            <img class="ris_img" src="">
            <div class="rating_overlay">
                <span class="stella" id="1" title="">&#9734;</span>
                <span class="stella" id="2" title="">&#9734;</span>
                <span class="stella" id="3" title="" >&#9734;</span>
                <span class="stella" id="4" title="">&#9734;</span>
                <span class="stella" id="5"  title="">&#9734;</span>
            </div>
            <p></p>
        </div>
    </div>
    <div class="pagine">
        <p class="prev"><</p>
        <p class="pages">1/1</p>
        <p class="next">></p>
    </div>
</div>

</body>
</html>
<?php }
else{
    header("Location: index.php");
}
?>

<?php
    if($_GET['type'] == 'fav'){
        $type = 'piace';
    }
    else{
        $type = $_GET['type'];
    }
?>

<script>

    var lista = '<?php echo($type) ?>'
</script>

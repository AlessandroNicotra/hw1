<?php if(isset($_COOKIE["hw1_id"])){ ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="search.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="preferito.js" defer="true"></script>
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
    <h1>AGGIUNGI PREFERITO</h1>
    <p>Da lista film piaciuti</p>
    <div id="risultati">
        <h1 id="errore"> ERRORE RICERCA</h1>
        <div class="risultato">
            <img class="ris_img" src="">
            <p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src="">
            <p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src="">
            <p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src="">
            <p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
        </div>
        <div class="risultato">
            <img class="ris_img" src=""><p></p>
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

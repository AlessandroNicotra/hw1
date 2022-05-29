<?php if(isset($_COOKIE["hw1_id"])){?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, minimum-scale=1">
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="search.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="search.js" defer="true"></script>
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
        <div id="risultati">
            <h1 id="errore"></h1>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato"">
            <img class="ris_img" src="">
            <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
            <a class="risultato">
                <img class="ris_img" src="">
                <p></p>
            </a>
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
    $cerca = $_GET['cerca'];
?>

<script>
    var search = '<?php echo $cerca; ?>'
</script>

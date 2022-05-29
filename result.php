<?php
$id = $_GET['film'];
if(isset($_COOKIE["hw1_id"]))
{$cookie = $_COOKIE["hw1_id"];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, minimum-scale=1">
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="result.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="result.js" defer="true"></script>
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

    <div class="ris">
        <div class="movie">
            <div class="poster">
                <img class="poster" src="">
                <p class="titolo"></p>
            </div>

            <div class="user">
                <div class="rate">
                    <div class="stelle">
                        <span class="stella" id="1">&#9734;</span>
                        <span class="stella" id="2">&#9734;</span>
                        <span class="stella" id="3">&#9734;</span>
                        <span class="stella" id="4">&#9734;</span>
                        <span class="stella" id="5">&#9734;</span>
                    </div>
                    <p>VOTA</p>
                </div>
                <div class="buttons">
                    <div class="button" id="visto">
                        <span class="simbolo"><?php
                            require_once('config.php');
                            $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
                            $result = mysqli_fetch_assoc($query);
                            if(($result['n']) == 1){
                                $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
                                $result = mysqli_fetch_assoc($query);
                                if($result['n'] != 0){
                                    $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                                    $result = mysqli_fetch_assoc($query);
                                    if($result['visto'] == 0){
                                        echo ('&#9734;');
                                        $v = 0;
                                    }
                                    else{
                                        echo ('&#9733;');
                                        $v = 1;
                                    }
                                }
                                else{
                                    echo ('&#9734;');
                                    $v = 0;
                                }
                            }
                            else{
                                echo ('&#9734;');
                                $v = 0;
                            }
                        ?></span>
                        <span>Visto</span>
                    </div>
                    <div class="button" id="like">
                        <span class="simbolo"><?php
                            require_once('config.php');
                            $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
                            $result = mysqli_fetch_assoc($query);
                            if(($result['n']) == 1){
                                $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
                                $result = mysqli_fetch_assoc($query);
                                if($result['n'] != 0){
                                    $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                                    $result = mysqli_fetch_assoc($query);
                                    if($result['piace'] == 0){
                                        echo ('&#9825;');
                                        $l = 0;
                                    }
                                    else{
                                        echo ('&#9829;');
                                        $l = 1;
                                    }
                                }
                                else{
                                    echo ('&#9825;');
                                    $l = 0;
                                }
                            }
                            else{
                                echo ('&#9825;');
                                $l = 0;
                            }
                            ?></span>
                        <span>Like</span>
                    </div>
                    <div class="button" id="watchlist">
                        <span class="simbolo"><?php
                            require_once('config.php');
                            $query = $connessione->query("SELECT count(*) as n FROM information_schema.TABLES WHERE (TABLE_SCHEMA = 'hw1') and (TABLE_NAME = '$cookie')");
                            $result = mysqli_fetch_assoc($query);
                            if(($result['n']) == 1){
                                $query = $connessione->query("SELECT count(*) as n FROM " . $cookie . " WHERE IMDBid = '$id'");
                                $result = mysqli_fetch_assoc($query);
                                if($result['n'] != 0){
                                    $query = $connessione->query("SELECT * FROM " . $cookie . " WHERE IMDBid = '$id'");
                                    $result = mysqli_fetch_assoc($query);
                                    if($result['watchlist'] == 0){
                                        echo ('&#9746;');
                                        $w = 0;
                                    }
                                    else{
                                        echo ('&#9745;');
                                        $w = 1;
                                    }
                                }
                                else{
                                    echo ('&#9746;');
                                    $w = 0;
                                }
                            }
                            else{
                                echo ('&#9746;');
                                $w = 0;
                            }
                            ?></span>
                        <span>Watchlist</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text">
            <span class="titolo"></span>
            <span class="anno"></span>
            <span class="regista"></span>
            <span class="durata"></span>
            <span class="plot"></span>
            <div class="ratings">
                <span class="rate">RATINGS</span><br>
                <span class="rotten"></span>
                <span class="imdb"></span>
                <span class="meta"></span>
            </div>
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
    $id = $_GET['film'];
?>

<script>
    var film_id = '<?php echo $id; ?>'
    var v = '<?php echo $v; ?>'
    var l = '<?php echo $l; ?>'
    var w = '<?php echo $w; ?>'
</script>
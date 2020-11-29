<?php
require "../Autoloader.php";
Autoloader::register();

use App\Sondage;

session_start();
require "header.php";


if (empty($_SESSION["user"])) {
    header('location:login.php');
}

$id = $_GET['id'];

$sondage = new Sondage();

$display = $sondage->getOneSond($id);
echo "<br> Sondage: <br>";
var_dump($display);

$results = $sondage->getResults($id);
echo "<br> results: <br>";
var_dump($results);

?>
<section>
    <h2><?= $display->sondage_title ?></h2>

    <?php 
        if($display->status_sondage == 'On'){
            echo "<div class='result'></div>";
        }
    
    ?>


</section>










<?php

require "footer.php"

?>
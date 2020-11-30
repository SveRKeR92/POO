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

$participation = $sondage->checkIfParticipated($_SESSION['user']['id'], $id);
var_dump($participation);

?>
<section id="sondage_container" class="<?=$display->sondage_id?>">
    <h2><?= $display->sondage_title ?></h2>

    <?php 
        if($display->status_sondage == 'On' && !$participation){
            echo "<div class='result'>$display->sondage_question1 : $results->result_1 votes  <input type='radio' name='vote' value='1' id='vote1'> <label for='vote1'>Voter 1</label></div>";
            echo "<div class='result'>$display->sondage_question2 : $results->result_2 votes  <input type='radio' name='vote' value='2' id='vote2'> <label for='vote2'>Voter 2</label></div>";
            echo "<div class='result'>$display->sondage_question3 : $results->result_3 votes  <input type='radio' name='vote' value='3' id='vote3'> <label for='vote3'>Voter 3</label></div>";
            echo "<div class='result'>$display->sondage_question4 : $results->result_4 votes  <input type='radio' name='vote' value='4' id='vote4'> <label for='vote4'>Voter 4</label></div>";
            echo "<p>Ce sondage est toujours en cours, vous pouvez voter en choissant une question et en appuyant sur le bouton voter</p>";
            echo "<br>";
            echo "<button id='vote'>Voter<button>";
        }
        if($display->status_sondage == 'Off' || $participation){
            echo "<div class='result'>$display->sondage_question1 : $results->result_1 votes</div>";
            echo "<div class='result'>$display->sondage_question2 : $results->result_2 votes  </div>";
            echo "<div class='result'>$display->sondage_question3 : $results->result_3 votes  </div>";
            echo "<div class='result'>$display->sondage_question4 : $results->result_4 votes  </div>";
            if($participation && $display->status_sondage == 'On'){
                echo "<p>Vous avez déjà participé à ce sondage, vous pouvez toujours consulter les résultats</p>";
            }else{
                echo "<p>Ce sondage est terminé ! Vous pouvez tonjours consulter les résultats affichés au dessus</p>";
            }
        }
    ?>


</section>

<script src="../js/vote.js"></script>


<?php

require "footer.php"

?>
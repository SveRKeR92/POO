<?php
require "App/Chat.php";
require "App/Friends.php";
require "App/Sondage.php";
require "App/Users.php";

$chat = new Chat();
$friends = new Friends();
$sondage = new Sondage();
$users = new Users();

// Fonctions à appeler avec ajax

switch($_GET["function"]){
    
}
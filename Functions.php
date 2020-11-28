<?php
require "./Autoloader.php";
Autoloader::register();

session_start();

use App\Chat;
use App\Friends;
use App\Sondage;
use App\Users;


$chat = new Chat();
$friends = new Friends();
$sondage = new Sondage();
$users = new Users();

// Fonctions à appeler avec ajax

switch ($_GET["function"]) {
    case "login":

        break;

    case "signup":
        $users->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)", $_POST);
        break;
}

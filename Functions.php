<?php
session_start();
require "./Autoloader.php";
Autoloader::register();


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
        var_dump($_POST);
        $verif = $users->pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $verif->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
        $verif->bindParam(':password', $_POST["password"], PDO::PARAM_STR);
        $verif->execute();

        if ($verif->rowCount() > 0) {
            $infos = $verif->fetch(PDO::FETCH_OBJ);
            $_SESSION["user"]["id"] = $infos->user_id;
            $_SESSION["user"]["pseudo"] = $infos->pseudo;
            $_SESSION["user"]["email"] = $infos->email;
            var_dump($_SESSION);
            var_dump($infos);
        } else {
            echo "pas content";
        }

        break;

    case "signup":
        var_dump($_POST);
        $users->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)", $_POST);
        break;

    case "sendMessage":
        $chat->sendMessage($_POST);
        break;

    case "createSond":
        var_dump($_POST);
        $sondage->createSond($_POST);
        break;

    case "vote":
        $id = $_POST["data"][0];
        $sond_id = $_POST["data"][1];
        var_dump($id);
        var_dump($sond_id);
        $sondage->Vote($id, $sond_id);
        echo json_encode("");
        break;

    case "MySonds":
        $sondage->getMySonds($_SESSION['user']['id']);
        break;

    case "endSond":
        $sondage->endSond($_POST["id"][0]);
        break;
}

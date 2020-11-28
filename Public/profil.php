<?php
session_start();
require "header.php";

var_dump($_SESSION);

if(empty($_SESSION["user"])){
    header('location:login.php');
}

?>

<a href="disconnect.php">Se déconnecter</a>

<?php
require "footer.php";
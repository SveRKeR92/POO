<?php
session_start();
require "header.php";

if(empty($_SESSION["user"])){
    header('location:login.php');
}

var_dump($_SESSION["user"]);

?>

<section class="profil">
    
    <a href="disconnect.php">Se déconnecter</a>
</section>

<?php
require "footer.php";
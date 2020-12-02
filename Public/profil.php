<?php
session_start();
require "header.php";

if(empty($_SESSION["user"])){
    header('location:login.php');
}

?>

<section class="profil">
    <button id="friendsButton">Cacher tes amis</button>
    <ul id="friendsList"></ul>
    <a href="disconnect.php">Se déconnecter</a>
</section>

<?php
require "footer.php";
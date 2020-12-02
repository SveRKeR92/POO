<?php
session_start();
require "header.php";

if (empty($_SESSION["user"])) {
    header('location:login.php');
}

?>

<div class="search-container">
    <section>

        <form id="formSearch" action="">

            <h3>Qui voulez vous ajouter en ami ?</h3>
            <br>

            Pseudo: <input type="text" size="10" maxlength="40" name="name" id="recherche" /><br />

            <input type="button" value="Recherche" id="research" />

            <br>
            <br>

            <ul id="friendSearch">

            </ul>
        </form>
    </section>
    <section>
        <button id="friendsButton">Cacher tes amis</button>
        <ul id="friendsList"></ul>
        <a href="disconnect.php">Se déconnecter</a>
    </section>
</div>




<?php
require "footer.php";

<?php
session_start();
require "header.php";

if(empty($_SESSION["user"])){
    header('location:login.php');
}

var_dump($_SESSION["user"]);

?>

<form id="formSearch" action="">

    <h3>Qui voulez vous ajouter en ami ?</h3>
    <br>

	Pseudo: <input type="text" size="10" maxlength="40" name="name" id="recherche" /><br />
	
    <input type="button" value="Recherche" id="research"/>
    
    <br>
    <br>

    <ul id="friendSearch">

    </ul>
</form>


<?php
require "footer.php";
<?php
session_start();

var_dump($_SESSION);
require "../Autoloader.php";
Autoloader::register();

require "header.php";

 if(empty($_SESSION["user"])){
    header('location:login.php');
}

var_dump($_SESSION["user"]);

?>

<section class="profil">
    
    <a href="disconnect.php">Se déconnecter</a>
</section>

<form id="formulaire">
    <br><br>
    <input type="text" name="pseudo" placeholder="Pseudo" />
    <br><br>
    <textarea placeholder="votre message" name="message" type="text"></textarea>
    <br><br>
    <input type="button" value="envoyer" id="sendMessage">
    <br><br>
</form>   

<a href="disconnect.php">Se déconnecter</a>
<?php
require "footer.php";
?>

<script>

    $("#sendMessage") .click(function(){
        let data = $("#formulaire").serializeArray();
        console.log(data);
        $.ajax({
            url:'../Functions.php?function=sendMessage',
            method:"POST",
            data:data,
            success:function(response){
                console.log();
            }
        })
    })

</script>
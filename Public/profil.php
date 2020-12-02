<?php
session_start();

require "../Autoloader.php";
Autoloader::register();

require "header.php";

 if(empty($_SESSION["user"])){
    header('location:login.php');
}

?>

<section class="profil">

    <form id="infos">
        <label for="pseudo">Votre Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" readonly>
        <br>
        <label for="email">Votre Email :</label>
        <input type="text" name="email" id="email" readonly>
        <br>
        <label for="pass">Votre mot de passe :</label>
        <input type="password" name="password" id="pass-1" readonly>
        <br>
    </form>
    <div id="mdp-confirm" style="display: none;">
        <label for="pass">Confirmer votre mot de passe :</label>
        <br>
        <input type="password" name="password" id="pass-2">
    </div>
    <br>
    <button id="change">Changer mes informations</button>
    <button id="confirm" style="display: none;">Confirmer les changements</button>

   




    <form id="formulaire">
        <br><br>
        <input type="text" name="pseudo" placeholder="Pseudo" />
        <br><br>
        <textarea placeholder="votre message" name="message" type="text"></textarea>
        <br><br>
        <button id="sendMessage">Envoyer</button>
        <br><br>
    </form>   
    
    <button id="friendsButton">Cacher tes amis</button>
    <ul id="friendsList"></ul>
</section>

<?php
require "footer.php";
?>



<script src="../js/user.js"></script>

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
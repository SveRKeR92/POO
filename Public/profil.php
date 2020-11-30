<?php
session_start();
require "header.php";

 var_dump($_SESSION);

 if(empty($_SESSION["user"])){
    header('location:login.php');
}

  /*  if(isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message'])) 
    {
        $pseudo = $_POST['pseudo'];
        $message = $_POST['message'];
        $insertmsg= $dbconfig->prepare('INSERT INTO chat("pseudo", "message") VALUES(?, ?)');
        $insertmsg->execute(array($pseudo, $message));
    }
*/
// $destinataires = $bdd->query('SELECT pseudo FROM user ORDER BY pseudo');

?>


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
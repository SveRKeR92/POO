<?php
session_start();
require "header.php";

if(empty($_SESSION["user"])){
    header('location:login.php');
}

?>



<?php
require "footer.php";
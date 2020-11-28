<?php
session_start();
require "header.php";
?>
<section id="signup-container">
    <form action="#" id="signup-form">
        <input type="pseudo" placeholder="Pseudo" name="pseudo" id="pseudo">
        <input type="email" placeholder="Email" name="email" id="email">
        <input type="password" placeholder="Password" name="password" id="password">
        <button id="signup">Sign up</button>
    </form>
</section>

<p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>

<?php
require "footer.php";

<?php
session_start();

require "header.php";
?>
<section id="login-container">
    <form id="login-form">
        <input type="email" placeholder="Email" name="email" id="email">
        <input type="password" placeholder="Password" name="password" id="password">
        <button id="login">Log In</button>
    </form>
</section>

<p>Pas de compte ? <a href="signup.php">S'inscrire</a></p>


<?php
require "footer.php";

<?php
$titre = "Connexion";
include "../../vue/navbar.html";
?>
<div class="connexion">
    <h1>Connexion</h1>
    <form action="connexion.php" method="post">
        <label for="login">Login</label>
        <input type="text" name="login" id="login">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        <input type="submit" value="Se connecter">
    </form>
</div>


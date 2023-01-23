<div class="connexion">
    <h1>Connexion</h1>
    <form action="connexion.php" method="post">
        <input type="hidden" name="controleur" value="controleurUtilisateur">
        <input type="hidden" name="action" value="connecterUtilisateur">

            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" id="mdp">
        
        <button type="submit">Se connecter</button>
    </form>
</div>
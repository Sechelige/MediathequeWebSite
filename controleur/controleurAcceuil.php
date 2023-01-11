<?php

class ControleurAcceuil {

    public static function afficheAcceuil() {
        $titre = "Acceuil";
        include ("vue/navBar.html");
        echo "<h1>Acceuil</h1>";
        echo "<a href='index.php?controleur=controleurUtilisateur&numUtilisateur=1'> Go to InformationPerso </a>";
        //include ("vue/acceuil.html");
        include ("vue/footer.html");
    }
}
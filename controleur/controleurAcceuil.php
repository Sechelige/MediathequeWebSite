<?php

class ControleurAcceuil {

    public static function afficheAcceuil() {
        $titre = "Acceuil";
        include ("vue/navBar.html");
        echo "<h1>Acceuil</h1>";
        echo "<a href='index.php?controleur=controleurUtilisateur&numUtilisateur=1'><h2>Go to InformationPerso</h2> </a>";
        //include ("vue/acceuil.html");//TODO
        include ("vue/footer.html");
    }
}
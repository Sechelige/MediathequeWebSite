<?php

class ControleurAcceuil {

    public static function afficheAcceuil() {
        $titre = "Acceuil";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/acceuil/acceuil.html");//TODO
        include ("vue/footer/footer.html");
    }
}
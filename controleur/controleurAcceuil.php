<?php

class ControleurAcceuil {

    public static function afficheAcceuil() {
        $titre = "Acceuil";
        //include ("vue/navBar.html");
        include ("vue/acceuil/acceuil.html");//TODO
        //include ("vue/footer.html");
    }
}
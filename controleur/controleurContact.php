<?php

class ControleurContact {

    public static function afficheContact() {
        $titre = "Contact";
        include ("vue/debut.php");
        include ("vue/header-one/header.php");
        include ("vue/contact/contact.php");
        include ("vue/footer/footer.html");
    }
}
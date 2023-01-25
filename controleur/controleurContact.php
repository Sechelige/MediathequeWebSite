<?php
require_once ("controleurNav.php");

class ControleurContact {

    public static function afficheContact() {
        $titre = "Contact";
        include ("vue/debut.php");
        controleurNav::afficheNav();
        include ("vue/contact/contact.php");
        include ("vue/footer/footer.html");
    }
}
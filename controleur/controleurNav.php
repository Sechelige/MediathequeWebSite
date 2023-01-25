<?php
require_once ("controleur/controleurUtilisateur.php");
class ControleurNav {

    public static function afficheNav() {
        if (controleurUtilisateur::sessionUtilisateur() != null) {
            $utilsateur = controleurUtilisateur::getUtilisateur();
            foreach ($utilsateur as $u) {
                $nom = $u->get("nomUtilisateur");
                $prenom = $u->get("prenomUtilisateur");  
            }
            include ("vue/header-one/header-connecté.php");
        } else {
            include ("vue//header-one/header.php");
        }
    }
}
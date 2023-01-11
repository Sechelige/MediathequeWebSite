<?php
$titre = "Ouvrage";
$numOuv = $_GET['numOuv'];
include "../../vue/navbar.html";
require_once "../../model/ouvrage.php";
require_once "../../config/connexion.php";
Connexion::connect();
Ouvrage::getOuvrage($numOuv);
Ouvrage::afficheOuvrage($numOuv);
include "../../vue/footer/footer.html";
?>
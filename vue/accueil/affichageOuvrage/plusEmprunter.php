
<div class='dernier-ajout'>
    <div class='titre-dernier-ajout'>Ouvrage les plus emprunter : </div>
    <div class='container-a'>
<?php
    foreach ($tab_plus_emprunter as $ouvrage) {
    echo "
        <a href='index.php?controleur=controleurOuvrage&action=afficheOuvrage&numOuvrage=".$ouvrage->get("numOuvrage")."'>
        <div class='ajout-ouv'>
            <div class='img-ajout-ouv'>
                <img src='img/ouvrage/".$ouvrage->get("numOuvrage").".png'>
            </div>
            <div class='titre-ajout-ouv'>
                ".$ouvrage->get("nomOuvrage")."
            </div>
        </div>
        </a>
    ";	
}
?>
    </div>
</div>
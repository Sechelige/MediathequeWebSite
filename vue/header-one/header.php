<nav>
<div class="logo-nav"><a href="index.php"><img src="img/navLogo.svg"/></a></div>
<div class="container-nav">
    <div class="nav-links">
        <ul>
            <li><a  class="select" href="index.php"><i class="fa-solid fa-book select"></i>Accueil</a></li>
            <li><a href=""><i class="fa-solid fa-pen-nib"></i>Auteur</a></li>
            <li><a href=""><i class="fa-solid fa-book"></i>Ouvrages</a></li>
            <li><a href="index.php?controleur=controleurContact"><i class="fa-solid fa-address-book"></i>Contact</a></li>
            <li><a href="index.php?controleur=controleurRecherche"><i class="fa-solid fa-magnifying-glass"></i>Recherche</a></li>
        </ul>
    </div>

    <div class="extend-nav">
        <ul>
            <li><a href=""><i class="fa-solid fa-bell"></i></a></li>
            <div class="log"><li><a href="index.php?controleur=controleurConnexion"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li></div>
        </ul>
    </div>

    <div class="container-nav-responsive">
    <div class="nav-links">
        <ul>
            <li><a  class="select" href="index.php"><i class="fa-solid fa-book select"></i></a></li>
            <li><a href=""><i class="fa-solid fa-pen-nib"></i></a></li>
            <li><a href=""><i class="fa-solid fa-book"></i></a></li>
            <li><a href="index.php?controleur=controleurContact"><i class="fa-solid fa-address-book"></i></a></li>
            <li><a href="index.php?controleur=controleurRecherche"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        </ul>
    </div>
    <div class="extend-nav-connect">
        <ul>
            <div class="log" id="log-info"><li><i class="fa-solid fa-user"></i></a></li></div>
        </ul>
    </div>
</div>

</div>




</nav>
<script>
//add event listener to the button
document.getElementById('log-info').addEventListener('click', affiche);
//function to display the div
function affiche() {
    var div = document.getElementById('uti-prop');
    if (div.style.display === 'none') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
}
</script>
<!-- version sans le login -->
<!--

    <div class="extend-nav-connect">
        <ul>
            <li><a href=""><i class="fa-solid fa-bell"></i></a></li>
            <div class="log" id="log-info"><li><i class="fa-solid fa-user"></i>Amar Quentin<?php //echo "$nomUtilisateur $prenomUtilisateur";?></a></li></div>
            //<li><div class="affiche-utili-prop"></div><i class="fa-solid fa-bars"></i></li>
            </ul>
    </div>
    <div class="extend-nav-utili-prop" id="uti-prop">
        <ul>
            <li><a href="index.php?controleur=controleurUtilisateur&numUtilisateur=1"><i class="fa-solid fa-user"></i>Mes Informations</a></li>
            <li><a href="index.php?controleur=controleurEmprunt&numUtilisateur=1"><i class="fa-solid fa-cog"></i>Emprunts</a></li>
            <li><a href="index.php?controleur=controleurReservation&numUtilisateur=1"><i class="fa-solid fa-cog"></i>Réservations</a></li>
            <li><a href="index.php?"><i class="fa-solid fa-sign-out-alt"></i>Deconnexion</a></li>
        </ul>
    </div>
<div class="container-nav-responsive">
    <div class="nav-links">
        <ul>
            <li><a  class="select" href="index.php"><i class="fa-solid fa-book select"></i></a></li>
            <li><a href=""><i class="fa-solid fa-pen-nib"></i></a></li>
            <li><a href=""><i class="fa-solid fa-book"></i></a></li>
            <li><a href="index.php?controleur=controleurContact"><i class="fa-solid fa-address-book"></i></a></li>
            <li><a href="index.php?controleur=controleurRecherche"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        </ul>
    </div>
    <div class="extend-nav-connect">
        <ul>
            <div class="log" id="log-info"><li><i class="fa-solid fa-user"></i></a></li></div>
        </ul>
</div>-->
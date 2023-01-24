<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='contact.css'>


</head>

<body>

    <?php
        include("../header-one/header.php");
        include("../footer/footer.html");
    ?>

    <div id="usedtobeHeader">
        <h1 class="Titre">Contact</h1>
    </div>
    
    <section class="main">

        <div class="content">
            <div class="contactPart1">
                <div class="left">
                    <h2>Nous contacter</h2>
                    <ul>
                        <li><a href="https://www.google.com/intl/fr/gmail/about/">MediathequeOrsay@gmail.com</a></li>
                        <li>
                            <p>Téléphone : +332345678</p>
                        </li>
                    </ul>


                </div>
                <div class="right">
                    <img src="blibliotheque.jpg" alt="">
                </div>
            </div>



            <div class="contactPart1">
                <div class="left">
                    <h2>Adresse</h2>
                    <a href="https://moovitapp.com/index/fr/transport_en_commun-line-91_06-Paris-662-3220607-91259271-0">Accès : RER B | 91-06 puis 91-11 | 9</a>
                    <p>La bibliothèque universitaire Paris-Saclay vous accueille sur le campus
                        d'Orsay. Elle fait partie du réseau des 40 bibliothèques et centres de documentation de l'Université Paris-Saclay.</p>
                </div>
                <div class="right">
                    <iframe src="https://www.google.com/maps/embed?pb=!4v1673269586869!6m8!1m7!1sd_YdcUlS9qQ5HDQgRqGuLg!2m2!1d48.71180741716282!2d2.16970783810165!3f16.554556910349568!4f9.81842069936667!5f0.7820865974627469" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>




        <div class="question">
            <h2>Une question ?</h2>
            <h2>Vous souhaitez être recontacté(e) par un membre de notre équipe ?</h2>



            <div class="contact">
                <form>
                    <input class="boite" autocomplete="off" type="text" name="Nom" placeholder="Nom"><br>
                    <input class="boite" autocomplete="off" type="email" name="Email" placeholder="Email"><br>
                    <label for="Contact">Quel service voulez-vous contacter ?</label><br/>
                    <select name="personne à contacter" id="Contact">
                            <option value="service inscription">Bibliothécaire</option>
                            <option value="directeur">Service évènementiel</option>
                            <option value="autre">Autre...</option>
                         </select><br>
                    <textarea class="boite" name="Message" placeholder="Message"></textarea><br>
                    <input class='envoyer' type="submit" name="Envoyer">

                </form>

            </div>
        </div>
    </section>


    <div class="reseauxSociaux">
        <h3 class="reseau">Suivez nous sur nos réseaux !</h3>
        <a href="https://twitter.com/?lang=fr"><img class="icons" src="twitter.png" alt="image logo twitter"></a>
        <a href="https://www.instagram.com"><img class="icons" src="instagram.png" alt="image logo instagram"></a>
        <a href="https://fr-fr.facebook.com"><img class="icons" src="facebook.png" alt="image logo facebook"></a>
    </div>
</body>
</html>
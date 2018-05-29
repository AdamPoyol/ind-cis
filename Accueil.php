<?php

require_once("./inc/init.inc.php");
require_once("./inc/header.inc.php");
require_once("./inc/fonction.inc.php");

?>

    <!-- bannière -->
    <section class="container-fluid banner" style="margin-top: 5%">
        <div class="ban">
            <img src="img/ban.jpg" alt="bannière du site">
        </div>
        <div class="inner-banner">
            <h1>Décide toi !</h1>
            <a href="./Connexion.php"><button class="btn btn-custom">Connexion</button></a>
            <a href="./Inscription.php"><button class="btn btn-custom">Inscription</button></a>
        </div>
    </section>
    <!-- end bannière -->

    <!-- radio -->
    <section class="container-fluid radio">
        <div class="container">
            <div class="row">
                <h2 id="radio">Radio</h2>
                <hr class="separator">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Fun radio</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>NRJ</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Europe 1</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
            </div>
        </div>
    </section>
    <!-- end radio -->

    <!-- playlist -->
    <section class="container-fluid playlist">
        <div class="container">
        <h2 id="playlist">Ma Playlist</h2>
        <hr class="separator">
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
            <article class="col-md-3 col-lg-3 col-xs-12 col-sm-12 item-folio">

            </article>
        </div>
    </section>
    <!-- end playlist -->

    <!-- top france -->
    <section class="container-fluid france">
        <div class="container">
            <div class="row">
                <h2 id="france">Top France</h2>
                <hr class="separator">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Lacrim - Noche</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Rohff - La puissance</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Maître Gims - La même</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
            </div>
        </div>
    </section>
    <!-- end top france -->

    <!-- nouveautés -->
    <section class="container-fluid news">
        <div class="container">
            <div class="row">
                <h2 id="news">Nouveautés</h2>
                <hr class="separator">
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Selena Gomez - Back To You</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Pharrell Williams - Sangria Wine</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
                <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <h2>Christine and the Queens - Girlfriend (feat. Dâm-Funk)</h2>
                    <p>ICI RADIO AVEC BOUTON LECTURE</p>
                </article>
            </div>
        </div>
    </section>
    <!-- end nouveautés-->

<?php 
require_once("./inc/footer.inc.php");
?>
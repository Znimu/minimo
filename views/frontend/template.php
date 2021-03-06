<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/foundation.min.css">
        <link rel="stylesheet" href="public/css/app.css">
    </head>
        
    <body>
        <div class="div-connexion-top">
            <div class="grid-container connexion">
                <div class="top-bar">
                    <div class="top-bar-left">
                        <?php
                            if (isset($_SESSION['user']) && $_SESSION['user'] !== "") {
                        ?>
                        <p>Connecté : <strong><?= $_SESSION['user'] ?></strong>
                            (<a class="link-lowercase" href="admin.php">admin</a> - 
                            <?php
                                if (isset($_SESSION['edition']) && $_SESSION['edition'] === true) {
                            ?>
                            <a class="link-lowercase" href="index.php?action=editionEnd">retour au mode normal</a>)
                            <?php
                                }
                                else {
                            ?>
                            <a class="link-lowercase" href="index.php?action=edition">activer le mode edition</a>)
                            <?php
                                }
                            ?>
                        </p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="top-bar-right">
                        <?php
                            if (isset($_SESSION['user'])) {
                        ?>
                        <a class="lien-connexion-frontend" href="?action=deconnexion">
                            <i class="fas fa-power-off"></i>
                            Deconnexion
                        </a>
                        <?php
                            }
                            else {
                        ?>
                        <a class="lien-connexion-frontend" href="?action=connexion">Se connecter</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-container site-bar">
            <div class="top-bar menu-top">
                <div class="top-bar-left">
                    <a href="index.php">
                        <img class="img-logo" src="public/img/logo_minimo.png" />
                    </a>
                </div>

                <div class="top-bar-right">
                    <ul class="dropdown menu">
                        <li><a href="?action=categorie&cat=styleDeVie">Lifestyle</a></li>
                        <li><a href="?action=categorie&cat=photoJournal">Photodiary</a></li>
                        <li><a href="?action=categorie&cat=musique">Music</a></li>
                        <li><a href="?action=categorie&cat=visites">Travel</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?= $content ?>

        <div class="block-footer">
            <div class="grid-container">
                <div class="top-bar">
                    <div class="top-bar-left">
                        <ul class="menu">
                            <li><a class="footer-links" href="#">Terms and conditions</a></li>
                            <li><a class="footer-links" href="#">Privacy</a></li>
                            <li><a class="footer-links" href="?action=contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="top-bar-right">Follow 
                        <i class="fab fa-facebook-f"></i> 
                        <i class="fab fa-twitter"></i> 
                        <i class="fab fa-linkedin-in"></i>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/what-input.js"></script>
    <script src="public/js/vendor/foundation.js"></script>
    <script src="public/js/app.js"></script>
</html>
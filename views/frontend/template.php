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
        <div class="grid-container">
            <div class="top-bar-left grid-x grid-margin-x">
                <img class="img-logo" src="public/img/logo_minimo.png" />
            </div>
            <div class="top-bar-right">
                <ul class="dropdown menu">
                    <li><a href="?action=categorie&cat=styleDeVie">Lifestyle</a></li>
                    <li><a href="?action=categorie&cat=photoJournal">Photodiary</a></li>
                    <li><a href="?action=categorie&cat=musique">Music</a></li>
                    <li><a href="?action=categorie&cat=visites">Travel</a></li>
                </ul>
            </div>

            <div class="clear-both"></div>
        </div>
        
        <?= $content ?>

        <div class="block-footer">
            <div class="grid-container">
                <div class="grid-x grid-margin-x cell">
                    <ul class="menu">
                        <li><a class="footer-links" href="#">Terms and conditions</a></li>
                        <li><a class="footer-links" href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="footer-float-right">Follow 
                    <i class="fab fa-facebook-f"></i> 
                    <i class="fab fa-twitter"></i> 
                    <i class="fab fa-linkedin-in"></i>
                </div>
            </div>
        </div>
    </body>

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/what-input.js"></script>
    <script src="public/js/vendor/foundation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/app.js"></script>
</html>
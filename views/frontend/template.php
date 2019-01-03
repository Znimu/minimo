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
        <div class="top-bar-left row">
            <img class="img-logo" src="public/img/logo_minimo.png" />
        </div>
        <div class="top-bar-right">
            <ul class="dropdown menu">
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Photodiary</a></li>
                <li><a href="#">Music</a></li>
                <li><a href="#">Travel</a></li>
            </ul>
        </div>
        <?= $content ?>

        <div class="block-footer">
            <div class="row column">
            <ul class="menu">
                <li><a class="footer-links" href="#">Terms and conditions</a></li>
                <li><a class="footer-links" href="#">Privacy</a></li>
                <li class="float-right">Follow 
                <i class="fab fa-facebook-f"></i> 
                <i class="fab fa-twitter"></i> 
                <i class="fab fa-linkedin-in"></i>
                </li>
            </ul>
            </div>
        </div>
    </body>

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/what-input.js"></script>
    <script src="public/js/vendor/foundation.js"></script>
    <script src="public/js/app.js"></script>
</html>
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
            <div class="top-bar menu-top">
                <div class="top-bar-left">
                    <a href="admin.php">
                        <img class="img-logo" src="public/img/logo_minimo.png" />
                        <p class="admin-subtitle">(admin)</p>
                        <a class="link-deconnexion" href="?action=deconnexion">déconnexion</a>
                    </a>
                </div>

                <div class="top-bar-right">
                    <ul class="dropdown menu">
                        <li><a href="?action=articles">Articles</a></li>
                        <li><a href="?action=images">Images</a></li>
                        <li><a href="?action=upload">Upload</a></li>
                        <li><a href="?action=comments">Comments</a></li>
                        <li><a href="?action=contacts">Contacts</a></li>
                        <li><a href="?action=newsletters">Newsletters</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <?= $content ?>
    </body>

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/what-input.js"></script>
    <script src="public/js/vendor/foundation.js"></script>
    <script src="public/js/app.js"></script>
</html>
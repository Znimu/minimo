<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Minimo admin - Connexion</title>
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
                    </a>
                </div>
            </div>
        </div>
        
        <div class="grid-container">
            <form method="post" action="admin.php" id="form-connexion" name="form-connexion">
                <table class="tab-connexion">
                    <tr>
                        <td>Login</td>
                        <td><input type="text" id="login" name="login" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" id="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="centered">
                            <input type="submit" id="btn-connexion" class="btn-connexion" name="btn-connexion" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    <script src="public/js/vendor/jquery.js"></script>
    <script src="public/js/vendor/what-input.js"></script>
    <script src="public/js/vendor/foundation.js"></script>
    <script src="public/js/app.js"></script>
</html>
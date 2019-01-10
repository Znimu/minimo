<?php $title = "Minimo - Connexion"; ?>

<?php ob_start(); ?>
<div class="grid-container connexion">
    <form method="post" action="index.php?action=accueil" id="form-connexion" name="form-connexion">
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
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
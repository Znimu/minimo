<?php $title = "Minimo - Connexion"; ?>

<?php ob_start(); ?>
<div class="grid-container connexion-div">
    <div class="div-connexion">
        <form method="post" action="index.php?action=accueil" id="form-connexion" name="form-connexion">
            <p>Login</p>
            <input type="text" id="login" name="login" />
            
            <p>Password</p>
            <input type="password" id="password" name="password" />
            
            <input type="submit" id="btn-connexion" class="btn-connexion" name="btn-connexion" value="Se connecter" />
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
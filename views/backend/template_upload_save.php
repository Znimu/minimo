<?php $title = "Minimo Admin - Upload Files"; ?>

<?php ob_start(); ?>
<div class="grid-container">
    <h1>Upload Files</h1>
    
    <?php
        if ($erreur === "")
            echo "Le fichier <strong>" . $name . "</strong> a bien été uploadé.";
        else
            echo $erreur;
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
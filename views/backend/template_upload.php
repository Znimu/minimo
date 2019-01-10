<?php $title = "Minimo Admin - Upload Files"; ?>

<?php ob_start(); ?>
<div class="grid-container">
    <h1>Upload Files</h1>
    
    <form method="post" action="admin.php?action=newFile" id="form-upload" name="form-upload" enctype="multipart/form-data">
        <input type="file" id="newFile" name="newFile" />
        <input type="submit" value="Upload ce fichier" class="btn-insert-submit" />
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
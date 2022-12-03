<?php ob_start(); ?>
<?php require('nav.php') ?>

<p>Une erreur est survenue : <?= $errorMessage ?></p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
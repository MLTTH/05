<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php require('footer.php') ?>
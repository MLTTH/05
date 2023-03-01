<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>


<div class="cover-container d-flex"></div>

<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <h1>Dashboard Admin</h1>
  </div>
  <div>
    <h3>Articles à valider</h3>
    <h3>Commentaires à valider</h3>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
<?php require('footer.php') ?>
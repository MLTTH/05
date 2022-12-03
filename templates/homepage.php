<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>
<div class="homepage-info">
        <h1>Le blog des dev !</h1>
        <h3 class="display-4">Thi-Thanh Nguyen <br><span>la développeuse qu’il vous faut !</span></h3>
        <img src="src/img/dev.jpg" class="img-fluid" alt="Responsive image">
        <a class="btn btn-primary" href="#" role="button">Télécharger mon CV</a>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
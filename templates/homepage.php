<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>


<div class="cover-container d-flex w-100 h-100"></div>

<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="src/img/dev.jpg" class="d-block mx-lg-auto img-fluid" alt="web developer" width="800" height="100%" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-4 font-weight-normal">Le blog des dev !</h1>
      <h3 class="lead font-weight-normal">Nguyen Thi-Thanh <br>
        <span>la développeuse qu’il vous faut !</span></h3>
        <div class="d-flex justify-content-center">
        <a href="src/pdf/resume.pdf" class="btn btn-lg btn-primary fw-bold border-white bg-dark role="button">Télécharger mon CV</a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
<?php require('footer.php') ?>
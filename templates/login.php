<?php ob_start(); ?>
<?php require('nav.php') ?>

<h1>Se connecter</h1>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="../img-contact.jpg" alt="" srcset="">
      </div>
      <div class="col offset-xl-1">
        <form>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email" id="form1Example13" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Mot de passe</label>
          </div>

          <!-- Submit button -->
          <input type="submit" class="btn btn-primary btn-lg" value="Valider"/>


        </form>
      </div>
    </div>
  </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
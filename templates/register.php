<?php ob_start(); ?>
<?php require('nav.php') ?>

<?php if ($error_sent) { ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Une erreur s'est produite.</strong> Veuillez réessayer.
  </div>
<?php } ?>

<section class="navbar navbar-dark bg-dark mh-100 d-flex justify-content-center py-5">


  <div class="row d-flex justify-content-center align-items-center h-100 ">
    <div>
      <h1 class="text-light">Créer un compte</h1>
    </div>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 5px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col order-2 order-lg-1">

                <form class="mx-1 mx-md-4" action="index.php?action=register" method="post">


                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Nom</label>
                      <input name="firstname" type="text" id="form3Example1c" class="form-control" placeholder="Votre nom" />
                      <?php if (isset($errors['firstname'])) { ?>
                        <div class="error"><?php echo $errors['firstname']; ?></div>
                      <?php } ?>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Prénom</label>
                      <input name="lastname" type="text" id="form3Example1c" class="form-control" placeholder="Votre prénom" />
                      <?php if (isset($errors['lastname'])) { ?>
                        <div class="error"><?php echo $errors['lastname']; ?></div>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email</label>
                      <input name="email" type="text" id="form3Example3c" class="form-control" placeholder="nom@exemple.com" />
                      <?php if (isset($errors['email'])) { ?>
                        <div class="error"><?php echo $errors['email']; ?></div>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Mot de passe</label>
                      <input name="password" type="password" id="form3Example4c" class="form-control" placeholder="Votre mot de passe" />
                      <?php if (isset($errors['password'])) { ?>
                        <div class="error"><?php echo $errors['password']; ?></div>
                      <?php } ?>
                    </div>
                  </div>

                  <div>
                    <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" value="Valider" />
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
<?php require('footer.php') ?>
<?php ob_start(); ?>
<?php require('nav.php') ?>

<h1>S'inscrire</h1>

<section class="navbar navbar-dark bg-dark vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col order-2 order-lg-1">

                <form class="mx-1 mx-md-4" action="index.php?action=register" method="post">
                

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input name="firstname" type="text" id="form3Example1c" class="form-control" />
                      <label class="form-label" for="form3Example1c">Nom</label>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input name="lastname" type="text" id="form3Example1c" class="form-control" />
                      <label class="form-label" for="form3Example1c">Prénom</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input name="email" type="email" id="form3Example3c" class="form-control" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <input name="password" type="password" id="form3Example4c" class="form-control" />
                      <label class="form-label" for="form3Example4c">Mot de passe</label>
                    </div>
                  </div>

                  <div>
                    <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" />
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
<?php ob_start(); ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
      <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
    </svg></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=contact">Nous contacter</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=posts">Tous les articles</a>
      </li>
    </ul>


    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">

          <?php if ($emailConnecte != null) { ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=addpost">Ajouter un article</a>
        </li>
        <a class="nav-link"><?php echo 'Bonjour ' . $emailConnecte; ?> </a>
      <?php } else { ?>
        <a class="nav-link" href="index.php?action=login">Se connecter</a>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=register">S'enregistrer</a>
        </li>
      <?php } ?>



      <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
        </li>
      <?php } else {
      ?>
      <?php } ?>


      </li>
      </ul>
    </div>



  </div>
</nav>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
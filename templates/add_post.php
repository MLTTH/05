<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>


<?php require('nav.php') ?>

<h1>Ajouter un article</h1>
<div class="container">
<?php if ($error_sent){ ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
Une erreur s'est produite. Veuillez réessayer.
</div>
<?php } ?>


   <form action="index.php?action=addpost" method="post">
   <div class="form-group container">
      <div>
         <label for="author">Auteur</label><br />
         <input class="form-control" type="text" id="author" name="author" placeholder="Votre prénom"/>
         <?php if (isset($errors['author'])){ ?>
         <div class="error"><?php echo $errors['author']; ?></div>
         <?php } ?>

         <label for="title">Titre</label><br />
         <input class="form-control" type="text" id="title" name="title" placeholder="Entrez un titre"/>
         <?php if (isset($errors['title'])){ ?>
         <div class="error"><?php echo $errors['title']; ?></div>
         <?php } ?>

                  
         <label for="subtitle">Chapô</label><br />
         <input class="form-control" type="text" id="subtitle" name="subtitle" placeholder="Entrez un sous titre"/>
         <?php if (isset($errors['subtitle'])){ ?>
         <div class="error"><?php echo $errors['subtitle']; ?></div>
         <?php } ?>
      </div>

   <div>
      <label for="content">Texte</label><br />
      <textarea class="form-control" id="content" placeholder="Tapez votre article" name="content"></textarea>
      <?php if (isset($errors['content'])){ ?>
      <div class="error"><?php echo $errors['content']; ?></div>
      <?php } ?>
   </div>

   <div class="d-flex justify-content-center">
      <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" />
   </div>
</div>

<p class="container">
   <a href="index.php?action=posts">Retour</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php require('footer.php') ?>
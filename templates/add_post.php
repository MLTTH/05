<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>


<?php require('nav.php') ?>

<h1>Ajouter un article</h1>
<div class="container">
<?php if ($error_sent){ ?>
  <p class="erreur">Le message n'a pu être envoyé. Une erreur s'est produite.</p>
<?php } ?>


   <form action="index.php?action=addpost" method="post">
   <div class="form-group">
      <div>
         <label for="author">Auteur</label><br />
         <input class="form-control" type="text" id="author" name="author"/>
         <?php if (isset($errors['author'])){ ?>
      <div class="erreur"><?php echo $errors['author']; ?></div>
         <?php } ?>
         <label for="title">Titre</label><br />
         <input class="form-control" type="text" id="title" name="title"/>
         <?php if (isset($errors['title'])){ ?>
      <div class="erreur"><?php echo $errors['title']; ?></div>
         <?php } ?>
      </div>

   <div>
      <label for="content">Texte</label><br />
      <textarea class="form-control" id="content" name="content"></textarea>
      <?php if (isset($errors['content'])){ ?>
      <div class="erreur"><?php echo $errors['content']; ?></div>
         <?php } ?>
   </div>

   <div class="d-flex justify-content-center">
      <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" />
   </div>
   </div>
   </form>
</div>

<p>
   <a href="index.php?action=posts">Tous les articles</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
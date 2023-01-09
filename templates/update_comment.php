<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>
<h1>Le blog des Dev</h1>
<?php if ($error_sent){ ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
 Une erreur s'est produite. Veuillez réessayer.
</div>
<?php } ?>
<p><a href="index.php?action=post&id=<?= $comment->post ?>">Retour à l'article</a></p>

<h2>Modifier le commentaire</h2>

<form action="index.php?action=updateComment&id=<?= $comment->postIdentifier ?>" method="post">
   <div>
      <label for="author">Auteur</label><br />
      <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment->author) ?>"/></input>
      <?php if (isset($errors['author'])){ ?>
      <div class="error"><?php echo $errors['author']; ?></div>
         <?php } ?>
   </div>
   <div>
      <label for="comment">Commentaire</label><br />
      <input type="text" id="comment" name="comment"><?= htmlspecialchars($comment->comment) ?></input>
      <?php if (isset($errors['comment'])){ ?>
      <div class="error"><?php echo $errors['comment']; ?></div>
         <?php } ?>
   </div>
   <div>
      <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" />
   </div>   
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php require('footer.php') ?>
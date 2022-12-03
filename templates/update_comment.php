<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>
<h1>Le blog des Dev</h1>
<p><a href="index.php?action=post&id=<?= $comment->post ?>">Retour à l'article</a></p>

<h2>Modifier le commentaire</h2>

<form action="index.php?action=updateComment&id=<?= $comment->postIdentifier ?>" method="post">
   <div>
      <label for="author">Auteur</label><br />
      <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment->author) ?>"/>
   </div>
   <div>
      <label for="comment">Commentaire</label><br />
      <textarea id="comment" name="comment"><?= htmlspecialchars($comment->comment) ?></textarea>
   </div>
   <div>
      <input type="submit" />
   </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
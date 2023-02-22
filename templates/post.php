<?php $title = "Le blog de l'AVBN"; ?>
<?php require('nav.php') ?>

<?php ob_start(); ?>
<h1><?= htmlspecialchars($post->title) ?></h1>
<h3><?= htmlspecialchars($post->subtitle) ?></h3>




<div class="news">
  <p>
    <em>publié le <?= $post->frenchCreationDate ?> par <?= $post->author ?></em>
  </p>

  <p>
    <?= nl2br(htmlspecialchars($post->content)) ?>
  </p>
</div>


<div class="row">
  <div class="col-sm-6 text-center">
    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&id=<?= $post->postIdentifier ?>" method="post">
      <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
        <?php if (isset($errors['author'])) { ?>
          <div class="error"><?php echo $errors['author']; ?></div>
        <?php } ?>
      </div>
      <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
        <?php if (isset($errors['comment'])) { ?>
          <div class="error"><?php echo $errors['comment']; ?></div>
        <?php } ?>
      </div>
      <div>
        <input type="submit" class="btn btn-lg btn-primary fw-bold border-white bg-dark role=" button">
      </div>
    </form>
  </div>

  <div class="col-sm-6">

    <?php
//visitor & user
  // var_dump($_SESSION);
if ((!isset($_SESSION['admin'])) || (($_SESSION['admin'] == 0))) {
  foreach ($comments as $comment) {
      if ($comment->status == 'PUBLISHED') {

        ?>
        <p><strong><?= htmlspecialchars($comment->author) ?>
        </strong> le <?= $comment->frenchCreationDate ?></p>
        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
      <?php
      }
  }
}
//admin is logged in
$isAdmin = (isset($_SESSION['admin']) && $_SESSION['admin'] == 1);
foreach ($comments as $comment) {
  if ($isAdmin) {
      ?>
      <a href="index.php?action=validateComment&id=<?= $comment->postIdentifier ?>&postId=<?= $post->postIdentifier ?>">Valider</a>
        <p><strong><?= htmlspecialchars($comment->author)?>
        </strong> le <?= $comment->frenchCreationDate ?> 
        <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
        <p><?php echo 'status :' . ($comment->status);?></p> 
      <?php
  }
  }
    ?>
  </div>
</div>

<p class="container">
  <a href="index.php?action=posts">Retour</a>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php require('footer.php') ?>
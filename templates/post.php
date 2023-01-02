<?php $title = "Le blog de l'AVBN"; ?>
<?php require('nav.php') ?>

<?php ob_start(); ?>
<h1><?= htmlspecialchars($post->title) ?></h1>




<div class="news">
    <p>
        <em>publié le <?= $post->frenchCreationDate ?></em>
    </p>

    <p>
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </p>
</div>


<div class="container">
    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&id=<?= $post->postIdentifier ?>" method="post">
   <div>
      <label for="author">Auteur</label><br />
      <input type="text" id="author" name="author" />
   </div>
   <div>
      <label for="comment">Commentaire</label><br />
      <textarea id="comment" name="comment"></textarea>
   </div>
   <div>
      <input type="submit" class="btn btn-lg btn-primary fw-bold border-white bg-dark role="button">
   </div>
    </form>
    
    <?php
foreach ($comments as $comment) {
    ?>
    <p><strong><?= htmlspecialchars($comment->author) ?></strong> le <?= $comment->frenchCreationDate ?> (<a href="index.php?action=updateComment&id=<?= $comment->postIdentifier ?>">modifier</a>)</p>
    <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
    <?php
}
?>
</div>

<p><a href="index.php?action=posts">Tous les articles</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>

<h1>Articles</h1>

<?php
foreach ($posts as $post) {
?>
    <div class="news">



    
        <h3>
            <?= htmlspecialchars($post->title); ?><br>
        </h3>
        <p>publié le <?= $post->frenchCreationDate; ?></p>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post->postIdentifier) ?>">Lire l'article</a></em>
        </p>
    </div>
<?php
}
?>

<div>
<a href="index.php?action=addpost"> 
    <button class="btn btn-primary" name="button" type="button">Ajouter un article</button> </a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
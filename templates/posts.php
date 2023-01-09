<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>

<h1>Découvrez tous nos articles</h1>

<?php
foreach ($posts as $post) {
?>

<div class="container">
    <div class="jumbotron mb-1 py-2">
        <h5 class="display-5">
            <?= htmlspecialchars($post->title); ?><br>
        </h5>
        <h6 class="display-6">
            <?= htmlspecialchars($post->subtitle); ?><br>
        </h6>
        <p class="card-text">publié le <?= $post->frenchCreationDate; ?> par <?= $post->author; ?></p>
        <div class="text-white font-weight-bold">
            <em><a href="index.php?action=post&id=<?= urlencode($post->postIdentifier) ?>">Lire l'article</a></em>
        </div>
    </div>
    </div>
<?php
}
?>

<div class="d-flex justify-content-center">
<a href="index.php?action=addpost"> 
    <button class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="button">Ajouter un article</button> </a>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php require('footer.php') ?>
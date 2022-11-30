<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<div class="homepage-info">

        <h1>Le blog des dev !</h1>
        <h3 class="display-4">Thi-Thanh Nguyen <br><span>la développeuse qu’il vous faut !</span></h3>
        <img src="src/img/dev.jpg" class="img-fluid" alt="Responsive image">
        <a class="btn btn-primary" href="#" role="button">Télécharger mon CV</a>

</div>

<p>Derniers articles du blog :</p>
<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title); ?>
            <em>le <?= $post->frenchCreationDate; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post->content)); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post->postIdentifier) ?>">Commentaires</a></em>
            <em><a href="index.php?action=register">XXXXXX</a></em>

        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
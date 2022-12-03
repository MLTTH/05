<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<?php require('nav.php') ?>

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
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
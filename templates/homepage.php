<?php $title = "Le blog des dev"; ?>

<?php ob_start(); ?>
<h1>Le blog des dev !</h1>
<p>Derniers articles du blog :</p>
<img src="dev.jpg" class="img-fluid" alt="Responsive image">
<?php
foreach ($posts as $post) {
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['french_creation_date']; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
            <br />
            <em><a href="index.php?action=post&id=<?= urlencode($post['postIdentifier']) ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
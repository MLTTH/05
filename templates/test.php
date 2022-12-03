<?php $title = "Le blog des dev"; ?>
<?php require('nav.php') ?>

<?php ob_start(); ?>
<h1>Thi-Thanh Nguyen</h1>
<p>Derniers billets du blog :</p>

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
        	<em><a href="post.php?id=<?= urlencode($post['postIdentifier']) ?>">coucou</a></em>
    	</p>
	</div>
<?php
}
?>
<?php $contents = ob_get_clean(); ?>

<?php require('layout.php') ?>
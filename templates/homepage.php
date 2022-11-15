<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>Le blog de Thi-Thanh Nguyen</title>
    	<link href="style.css" rel="stylesheet" />
	</head>

	<body>
    	<h1>Thi-Thanh Nguyen !</h1>
    	<p>Derniers articles du blog :</p>

    	<?php
    	foreach ($posts as $post) {
    	?>
        	<div class="news">
            	<h3>
                	<?php echo htmlspecialchars($post['title']); ?>
                	<em>le <?php echo $post['french_creation_date']; ?></em>
            	</h3>
            	<p>
                	<?php
                	// We display the post content.
                	echo nl2br(htmlspecialchars($post['content']));
                	?>
                	<br />
                	<em><a href="#">Commentaires</a></em>
            	</p>
        	</div>
    	<?php
    	} // The end of the posts loop.
    	?>
	</body>
</html>
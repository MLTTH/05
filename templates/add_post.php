<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>


<?php require('nav.php') ?>

<h1>Ajouter un article</h1>
<div class="container">

   
<form action="index.php?action=addpost" method="post">
<div class="form-group">
   <div>
      <label for="author">Auteur</label><br />
      <input class="form-control" type="text" id="author" name="author" />

      <label for="title">Titre</label><br />
      <input class="form-control" type="text" id="title" name="title" />

   </div>

   <div>
      <label for="content">Texte</label><br />
      <textarea class="form-control" id="content" name="content"></textarea>

   </div>
   <div>
      <input class="btn btn-primary" name="button" type="submit"/>
   </div>
</div>
</form>
</div>

<p><a href="index.php?action=posts">Tous les articles</a></p>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php $title = "Le blog des developpeurs"; ?>

<?php ob_start(); ?>


<?php require('nav.php') ?>

<h1>Ajouter un article</h1>
<div class="container">
<form action="index.php?action=addpost" method="post">
<div class="form-group">
   <div>
      <label for="author">Auteur</label><br />
      <input class="form-control <?php if (empty($_POST["author"])) { ?> invalid-form <?php }?>" type="text" id="author" name="author" value="<?php echo $_POST["author"]; ?>"/>
      <label for="title">Titre</label><br />
      <input class="form-control <?php if (empty($_POST["title"])) { ?> invalid-form <?php }?>" type="text" id="title" name="title" value="<?php echo $_POST["title"]; ?>"/>
   </div>
   <div>
      <label for="content">Texte</label><br />
      <textarea class="form-control <?php if (empty($_POST["content"])) { ?> invalid-form <?php }?>"id="content" name="content" value="<?php echo $_POST["content"]; ?>"></textarea>
   </div>
   <div>
      <input class="btn btn-primary" name="button" type="submit"/>
   </div>
</div>
</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
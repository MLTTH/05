<?php ob_start(); ?>

<?php require('nav.php') ?>

<h1>Contact Form</h1>

<div class="container">
<form action="index.php?action=contact" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Prénom</label>
    <input name="firstname" type="text" class="form-control <?php if (empty($_POST["firstname"])) { ?> invalid-form <?php }?>" id="exampleFormControlInput1" placeholder="Votre prénom" value="<?php echo $_POST["firstname"]; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom</label>
    <input name="lastname" type="text" class="form-control <?php if (empty($_POST["lastname"])) { ?> invalid-form <?php }?>" id="exampleFormControlInput1" placeholder="Votre nom" value="<?php echo $_POST["lastname"]; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email</label>
    <input name="email" type="email" class="form-control <?php if (empty($_POST["email"])) { ?> invalid-form <?php }?>" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $_POST["email"]; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea name="content" type="textarea" class="form-control <?php if (empty($_POST["content"])) { ?> invalid-form <?php }?>" id="exampleFormControlTextarea1" placeholder="Votre message ici" rows="3" value="<?php echo $_POST["content"]; ?>"></textarea>
  </div>

  <div>
    <input name="button" type="submit" />
  </div>

</form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
<?php ob_start(); ?>

<?php require('nav.php') ?>

<h1>Contact Form</h1>

<form action="index.php?action=contact" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Prénom</label>
    <input name="firstname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre prénom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom</label>
    <input name="lastname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre nom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea name="content" type="textarea" class="form-control" id="exampleFormControlTextarea1" placeholder="Votre message ici" rows="3"></textarea>
  </div>

  <div>
    <input name="button" type="submit" />
  </div>

</form>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
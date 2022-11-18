<?php ob_start(); ?>

<h1>Contact Form</h1>

<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Votre nom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre message ici" rows="3"></textarea>
  </div>
  <button type="button" class="btn btn-primary">Envoyer</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
<?php ob_start(); ?>

<?php require('nav.php') ?>

<h1>Contact form</h1>

<div class="container">
<?php if ($error_sent){ ?>
  <p class="erreur">Le message n'a pu être envoyé. Une erreur s'est produite.</p>
<?php } ?>

<form action="index.php?action=contact" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Prénom</label>
    <input name="firstname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre prénom" >
      <?php if (isset($errors['firstname'])){ ?>
      <div class="erreur"><?php echo $errors['firstname']; ?></div>
      <?php } ?>
    
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Nom</label>
    <input name="lastname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre nom">
    <?php if (isset($errors['lastname'])){ ?>
    <div class="erreur"><?php echo $errors['lastname']; ?></div>
    <?php } ?>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email</label>
    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" >
    <?php if (isset($errors['email'])){ ?>
    <div class="erreur"><?php echo $errors['email']; ?></div>
    <?php } ?>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea name="content" type="textarea" class="form-control" id="exampleFormControlTextarea1" placeholder="Votre message ici" rows="3"></textarea>
    <?php if (isset($errors['content'])){ ?>
    <div class="erreur"><?php echo $errors['content']; ?></div>
    <?php } ?>
  </div>

  <div class="d-flex justify-content-center">
    <input class="btn btn-lg btn-primary fw-bold border-white bg-dark" name="button" type="submit" />
  </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>
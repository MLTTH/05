<?php ob_start(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?action=register">Contact <span class="sr-only">(current)</span></a> //TODO
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Articles <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
<?php

require('src/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $postIdentifier = $_GET['id'];
} else {
    echo 'Erreur : aucun identifiant de billet envoyé';

    die;
}

$post = getPost($postIdentifier);
$comments = getComments($postIdentifier);

require('templates/post.php');
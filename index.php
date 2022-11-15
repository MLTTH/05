<?php
// index.php

require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepageController.php');
require_once('src/controllers/postController.php');

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {
    	if ($_GET['action'] === 'post') {
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
            	$postIdentifier = $_GET['id'];

            	post($postIdentifier);
        	} else {
            	throw new Exception('Aucun commentaire');
        	}
    	} elseif ($_GET['action'] === 'addComment') {
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
            	$postIdentifier = $_GET['id'];

            	addComment($postIdentifier, $_POST);
        	} else {
            	throw new Exception('Aucun identifiant de billet envoyé');
        	}
    	} else {
        	throw new Exception("La page que vous recherchez n'existe pas.");
    	}
	} else {
    	homepage();
	}
} catch (Exception $e) { // S'il y a eu une erreur, alors...
	echo 'Erreur : '.$e->getMessage();
}
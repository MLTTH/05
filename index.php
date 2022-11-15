<?php

require_once('src/controllers/homepageController.php');
require_once('src/controllers/postController.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
	if ($_GET['action'] === 'post') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$postIdentifier = $_GET['id'];

        	post($postIdentifier);
    	} else {
        	echo 'Aucun commentaire pour cet article';

        	die;
    	}
	} else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	homepage();
}
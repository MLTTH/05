<?php

function getPosts() {
	// We connect to the database.
	try {
    	$database = new PDO('mysql:host=localhost;dbname=05;charset=utf8', '05', 'password');
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}

	// We retrieve the 5 last blog posts.
	$statement = $database->query(
    	"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY french_creation_date DESC LIMIT 0, 5"
	);
	$posts = [];
	while (($row = $statement->fetch())) {
    	$post = [
        	'title' => $row['title'],
        	'french_creation_date' => $row['french_creation_date'],
        	'content' => $row['content'],
    	];

    	$posts[] = $post;
	}

	return $posts;
}

?>
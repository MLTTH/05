<?php

function getPosts() {
    $database = dbConnect();
    $statement = $database->query(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
    );
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'title' => $row['title'],
            'french_creation_date' => $row['french_creation_date'],
            'content' => $row['content'],
            'postIdentifier' => $row['id'],
        ];

        $posts[] = $post;
    }

    return $posts;
}

function getPost($postIdentifier) {
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    );
    $statement->execute([$postIdentifier]);

    $row = $statement->fetch();
    $post = [
        'title' => $row['title'],
        'french_creation_date' => $row['french_creation_date'],
        'content' => $row['content'],
        'postIdentifier' => $row['id'],
    ];

    return $post;
}

function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=05;charset=utf8', '05', 'password');

        return $database;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}
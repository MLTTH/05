<?php

namespace Application\Model\User;

require_once('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class User
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
}

class UserRepository
{
    public DatabaseConnection $connection;

    // public function getPost(string $postIdentifier): Post
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    //     );
    //     $statement->execute([$postIdentifier]);

    //     $row = $statement->fetch();
    //     $post = new Post();
    //     $post->title = $row['title'];
    //     $post->frenchCreationDate = $row['french_creation_date'];
    //     $post->content = $row['content'];
    //     $post->postIdentifier = $row['id'];

    //     return $post;
    // }

    // public function getPosts(): array
    // {
    //     $statement = $this->connection->getConnection()->query(
    //         "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
    //     );
    //     $posts = [];
    //     while (($row = $statement->fetch())) {
    //         $post = new Post();
    //         $post->title = $row['title'];
    //         $post->frenchCreationDate = $row['french_creation_date'];
    //         $post->content = $row['content'];
    //         $post->postIdentifier = $row['id'];

    //         $posts[] = $post;
    //     }

    //     return $posts;
    // }

    public function createUser(string $firstname, string $lastname, string $email, string $password): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO users(firstname, lastname, email, password) VALUES(?, ?, ?, ?)'
        );
        $affectedLines = $statement->execute([$firstname, $lastname, $email, $password]);

        return ($affectedLines > 0);
    }
}
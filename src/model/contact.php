<?php

namespace Application\Model\Contact;

require_once('src/lib/database.php');


use Application\Lib\Database\DatabaseConnection;


class Contact
{
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $content;
}

class ContactRepository
{
    public DatabaseConnection $connection;

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

    public function createContact(string $lastname, string $firstname, string $email, string $content): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO contacts(lastname, firstname, email, content) VALUES(?, ?, ?, ?)'
        );
        $affectedLines = $statement->execute([$lastname, $firstname, $email, $content]);
        return ($affectedLines > 0);
    }
}
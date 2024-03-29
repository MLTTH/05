<?php

namespace App\Model\Post;

require_once('src/lib/database.php');

use App\Lib\Database\DatabaseConnection;

class Post
{
    public string $author;
    public string $title;
    public string $subtitle;
    public string $frenchCreationDate;
    public string $content;
    public string $postIdentifier;
}

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(string $postIdentifier): Post
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, subtitle, content, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS french_creation_date 
            FROM posts WHERE id = ?"
        );
        $statement->execute([$postIdentifier]);

        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->subtitle = $row['subtitle'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->postIdentifier = $row['id'];
        $post->author = $row['author'];

        return $post;
    }

    public function getPosts(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, subtitle, content, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->subtitle = $row['subtitle'];
            $post->frenchCreationDate = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->postIdentifier = $row['id'];
            $post->author = $row['author'];

            $posts[] = $post;
        }

        return $posts;
    }

     public function createPost(string $title, string $subtitle, string $author, string $content): bool
     {
         $statement = $this->connection->getConnection()->prepare(
             'INSERT INTO posts( title, subtitle, author, content, creation_date) VALUES( ?, ?, ?, ?, NOW())'
         );
         $affectedLines = $statement->execute([$title, $subtitle, $author, $content]);
         return ($affectedLines > 0);
     }



    public function updatePost(string $title, string $subtitle, string $author, string $content): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE posts SET title = ?, subtitle = ?, author = ?, content = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$title, $subtitle, $author, $content]);

        return ($affectedLines > 0);
    }
}

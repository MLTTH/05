<?php

namespace App\Model\Comment;

require_once('src/lib/database.php');

use App\Lib\Database\DatabaseConnection;

//  Créer mon objet 'comment'
class Comment
{
    public string $postIdentifier;
    public string $author;
    public string $frenchCreationDate;
    public string $comment;
    public string $post;
    public string $status;
}

class CommentRepository
{
    public DatabaseConnection $connection;
    //afficher les commentaires
    public function getComments(string $post): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, author, comment, status, DATE_FORMAT(comment_date, '%d/%m/%Y') AS french_creation_date, post_id 
            FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
        );
        $statement->execute([$post]);

        $comments = [];
        while (($row = $statement->fetch())) {
            $comment = new Comment();
            $comment->postIdentifier = $row['id'];
            $comment->author = $row['author'];
            $comment->frenchCreationDate = $row['french_creation_date'];
            $comment->comment = $row['comment'];
            $comment->status = $row['status'];
            $comment->post = $row['post_id'];

            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment(string $postIdentifier): ?Comment
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, author, comment, status, DATE_FORMAT(comment_date, '%d/%m/%Y') AS french_creation_date, post_id FROM comments WHERE id = ?"
        );
        $statement->execute([$postIdentifier]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }


        $comment = new Comment();
        $comment->postIdentifier = $row['id'];
        $comment->author = $row['author'];
        $comment->frenchCreationDate = $row['french_creation_date'];
        $comment->comment = $row['comment'];
        $comment->status = $row['status'];
        $comment->post = $row['post_id'];

        return $comment;
    }

    //STATUS

    public function createComment(string $post, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
        );
        $affectedLines = $statement->execute([$post, $author, $comment]);

        return ($affectedLines > 0);
    }

    public function updateComment(string $postIdentifier, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE comments SET author = ?, comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$author, $comment, $postIdentifier]);
        
        return ($affectedLines > 0);
    }

    public function validateComment(string $postIdentifier): bool
    {
        $sql = "UPDATE comments SET status='PUBLISHED' WHERE id= ? AND status='PENDING'";
        //var_dump($sql);
        //die;
        $statement = $this->connection->getConnection()->prepare($sql
            //'UPDATE comments SET author = ?, comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$postIdentifier]);
        //var_dump($affectedLines);
        //die;
        return ($affectedLines > 0);
    }

    public function deleteComment(string $postIdentifier, string $author, string $comment): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE comments SET author = ?, comment = ? WHERE id = ?'
        );
        $affectedLines = $statement->execute([$author, $comment, $postIdentifier]);

        return ($affectedLines > 0);
    }
}

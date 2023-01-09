<?php
namespace App\Controllers\Comment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;

class AddCommentController 
{

    public function execute (string $post, array $input)
    {
        $author = null;
        $comment = null;
        
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }

        // $max_lenght = 5;
        // $lenght = strlen($comment);
        // if($lenght > 10) {
        //     echo 'Trop longue';
        //     var_dump($comment);
        // }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $author, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }
    }
}
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
        global $emailConnecte;
        // everyone can add a comment
        if  (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
            header('Location: index.php?action=post&id=' . $post);
        }
    
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $author, $comment);
        if (!$success) {
            header('Location: index.php?action=post&id=' . $post);
        }
        }
    }


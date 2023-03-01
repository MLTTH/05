<?php

namespace App\Controllers\Comment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;

class AddCommentController
{
    public function execute(string $post, array $input)
    {
        $author = null;
        $comment = null;
        global $emailConnecte;
        
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        // everyone can add a comment
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];
            header('Location: index.php?action=post&id=' . $post);
        }

        if (($emailConnecte) && !empty($input['comment'])) {
          $author = $_SESSION['firstname'];
          $comment = $input['comment'];
          header('Location: index.php?action=post&id=' . $post);
        }

        //validate a post as an admin
        if (isset($_POST['validate'])) { 
          $postId = $_POST['validate'];
          $result = $commentRepository->validateComment($postId);
          
            if ($result) {
              echo "Post validated successfully!";
            } else {
              echo "Failed to validate post.";
            }
          }

    
        $success = $commentRepository->createComment($post, $author, $comment);
        if (!$success) {
            header('Location: index.php?action=post&id=' . $post);
        }
    }
}

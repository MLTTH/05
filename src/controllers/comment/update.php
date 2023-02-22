<?php

namespace App\Controllers\Comment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $postIdentifier,$postId)
    {
        global $error_sent;
        global $errors;
        $error_sent = false;
        $errors = [];
        global $emailConnecte;

        // if (empty($input['button'])) {
        //     require('templates/update_comment.php');
        //     return;
        // }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        var_dump($commentRepository);
        $success = $commentRepository->validateComment($postIdentifier);
        if ($success) {
        header('Location: index.php?action=post&id=' . $postId);
        //         die;
        //     } else {
        //         header('Location: index.php?action=post&id=' .  $post);
        //         die;
        //     }
        //     require('templates/update_comment.php');
        //     return;
        }
         }
        }

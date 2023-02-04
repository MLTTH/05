<?php

namespace App\Controllers\Comment;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $postIdentifier, ?array $input)
    {
        global $error_sent;
        global $errors;
        $error_sent = false;
        $errors = [];
        global $emailConnecte;


        if (empty($input['button'])) {
            require('templates/update_comment.php');
            return;
        }
        if (empty($input['author'])) {
            $errors['author'] = 'ce champ est obligatoire';
        }
        if (empty($input['comment'])) {
            $errors['comment'] = 'ce champ est obligatoire';
        }
        if (count($errors)) {
            $error_sent = true;
            require('templates/update_comment.php');
            return;
            if ($input !== null) {
                $author = null;
                $comment = null;
                if (!empty($input['author']) && !empty($input['comment'])) {
                    $author = $input['author'];
                    $comment = $input['comment'];
                } else {
                    header('Location: index.php?action=posts');
                }


            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($postIdentifier, $author, $comment);
            if (!$success) {
                header('Location: index.php?action=updateComment&id=' . $postIdentifier);
                die;
            } else {
                header('Location: index.php?action=post&id=' .  $post);
                die;
            }
            require('templates/update_comment.php');
            return;
        }
        }
    }

}

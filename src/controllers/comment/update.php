<?php

namespace Application\Controllers\Comment\Update;

require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $postIdentifier, ?array $input)
    {
        // It handles the form submission when there is an input.
        if ($input !== null) {
            $author = null;
            $comment = null;
            if (!empty($input['author']) && !empty($input['comment'])) {
                $author = $input['author'];
                $comment = $input['comment'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($postIdentifier, $author, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=updateComment&id=' . $postIdentifier);
            }
        }

        // Otherwise, it displays the form.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($postIdentifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $postIdentifier n'existe pas.");
        }

        require('templates/update_comment.php');
    }
}
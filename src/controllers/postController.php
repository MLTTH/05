<?php

namespace Application\Controllers\PostController;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;
use Application\Model\Post\PostRepository;

class PostController
{
    public function execute(string $postIdentifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($postIdentifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($postIdentifier);

        require('templates/post.php');
    }
}
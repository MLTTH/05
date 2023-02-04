<?php

namespace App\Controllers\PostController;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');
require_once('src/model/user.php');


use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository;
use App\Model\Post\PostRepository;
use App\Model\User\User;

class PostController
{
    public function execute(string $postIdentifier)
    {     
        global $emailConnecte;

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
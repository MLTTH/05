<?php

namespace App\Controllers\PostsController;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Post\PostRepository;

class PostsController
{
    public function execute()
    {
        global $emailConnecte;
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/posts.php');
    }
}
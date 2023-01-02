<?php

namespace App\Controllers\HomepageController;

require_once('src/lib/database.php');
require_once('src/model/post.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Post\PostRepository;

class HomepageController
{
    public function execute()
    {
        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $posts = $postRepository->getPosts();

        require('templates/homepage.php');
    }
}
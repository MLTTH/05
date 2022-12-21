<?php

namespace Application\Controllers\AddPostController;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository; 
use Application\Model\Post\PostRepository;

class AddPostController
{
    public function execute(array $input)
    
    {
        global $error_sent;
        global $errors;
        $author = null;
        $id = null;
        $title = null;
        $content = null;
        $error_sent = false; 
        $errors = [];

        // if (empty($input['button'])) {
        //     require('templates/add_post.php');
        //     return;
        // }

        // if (empty($input['author'])){
        //     $errors['author'] = 'ce champ est obligatoire';
        // }

        // if (empty($input['title'])){
        //     $errors['title'] = 'ce champ est obligatoire';
        // }

        // if (empty($input['content'])){
        //     $errors['author'] = 'ce champ est obligatoire';
        // }
    
         if (!empty($input['author']) && !empty($input['title']) && !empty($input['content'])) {
             $author = $input["author"];
             $title = $input["title"];
             $content= $input["content"];
         } else {
             require('templates/add_post_invalid.php');
             return;
         }
    
        $addpostRepository = new PostRepository();
        $addpostRepository->connection = new DatabaseConnection();
        $success = $addpostRepository->createPost($title, $author, $content);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter !');
        } else {
            header('Location: index.php');
        }
    
    }

}
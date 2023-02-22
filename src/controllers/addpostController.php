<?php

namespace App\Controllers\AddPostController;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');
//require_once('src/model/user.php');


use App\Lib\Database\DatabaseConnection;
use App\Model\Comment\CommentRepository; 
use App\Model\Post\PostRepository;
//use App\Model\User\UserRepository;


class AddPostController
{
    public function execute(array $input)
    
    {
        global $error_sent;
        global $errors;
        $error_sent = false; 
        $errors = [];
        global $emailConnecte;


        if (empty($input['button'])) {
            require('templates/add_post.php');
            return;
        }
    
        if (empty($input['title'])){
            $errors['title'] = 'ce champ est obligatoire';
        }

        if (empty($input['subtitle'])){
            $errors['subtitle'] = 'ce champ est obligatoire';
        }
    
        // if (empty($input['author'])){
        //     $errors['author'] = 'ce champ est obligatoire';
        // }
        
        // if ((empty($input['author'])) || ((strlen($input['content']))) < 100) {
        //     $errors['content'] = 'Un article doit contenir au minimum 100 caractères';
        // } 
        
        if (empty($input['content'])){
            $errors['content'] = 'ce champ est obligatoire';
        }
        
        if (count($errors)) {
            $error_sent = true;
            require('templates/add_post.php');
            return;
        }


    
        $addpostRepository = new PostRepository();
        $addpostRepository->connection = new DatabaseConnection();
        $success = $addpostRepository->createPost($input['title'], $input['subtitle'], $_SESSION['firstname'], $input['content']);

        if (!$success) {
            header('Location: index.php?action=addpost');
        } else {
            header('Location: index.php?action=posts');
        }
    }
}

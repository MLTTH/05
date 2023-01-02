<?php
namespace App\Controllers\User;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\User\UserRepository;

class RegisterController{
    
    public function execute (array $input)
    {
        global $error_sent;
        global $errors; 
        $error_sent = false; 
        $errors = [];
        
    if (empty($input['button'])) {
        require('templates/register.php');
        return;
    }

        if (empty($input['firstname'])){
        $errors['firstname'] = 'ce champ est obligatoire';
    }
        if (empty($input['lastname'])){
        $errors['lastname'] = 'ce champ est obligatoire';
    }
        if (!empty($input['email'])){
        $input['email'] = filter_var($input['email'], FILTER_VALIDATE_EMAIL);
    } else {
        $errors['email'] = 'ce champ est obligatoire';
    }
        if (!empty($input['password'])){
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
    } else {
        $errors['password'] = 'ce champ est obligatoire';
    }
        if (count($errors)) {
        require('templates/register.php');
        return;
    }


    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($input['firstname'], $input['lastname'], $input['email'], $input['password']);
    if (!$success) {
        require('templates/register.php');
    } else {
        /**TODO: changer header*/
        header('Location: index.php');
    }
}
}
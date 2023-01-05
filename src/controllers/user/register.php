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
        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        
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
        $input['email'] = filter_var($input['email'], FILTER_VALIDATE_EMAIL);
        if (!empty($input['email'])){
        $userexistant = $userRepository->getUserbyEmail($input['email']);
        if  ($userexistant){
          $errors['email'] = 'email déjà utilisé';
        }
    } else {
        $errors['email'] = 'ce champ est obligatoire';
    }
        if ((!empty($input['password'])) && (strlen($input['password']) >= 8)) {
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
    } else if (empty($input['password'])) {
        $errors['password'] = 'ce champ est obligatoire';
    } else if ((!empty($input['password'])) && (strlen($input['password']) < 8) && 
        (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $input['password']))) {
          $errors['password'] = 'Le mot de passe doit contenir au moins une majuscule, un chiffre et un caractère spécial';
    } if (count($errors)) {
        require('templates/register.php');
        return;
    }




    $success = $userRepository->createUser($input['firstname'], $input['lastname'], $input['email'], $input['password']);
    if (!$success) {
        require('templates/register.php');
    } else {
        /**TODO: changer header*/
        header('Location: index.php');
    }
}
}
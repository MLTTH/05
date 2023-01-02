<?php
namespace App\Controllers\User\Login;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\User\UserRepository;

class LoginController{

public function execute (array $input)
{
    $email= null;
    $password = null;

    if (empty($input['button'])) {
        require('templates/login.php');
        return;
    }

    if (!empty($input['email']) && !empty($input['password'])) {
        $email= $input["email"];
        $password = $input["password"];

    } else {
            require('templates/register.php');
            return;
    }


    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($firstname, $lastname, $email, $password);
    if (!$success) {
        require('templates/register.php');
    } else {
        header('Location: templates/login.php');
    }

}
}
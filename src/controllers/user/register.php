<?php
namespace Application\Controllers\User\Add;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\User\UserRepository;

class RegisterController{

public function execute (array $input)
{
    $id = null;
    $firstname = null;
    $lastname = null;
    $email= null;
    $password = null;

    if (empty($input['button'])) {
        require('templates/register.php');
        return;
    }

    if (!empty($input['firstname']) && !empty($input['lastname']) && ((!empty($input['email']) || (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))) && !empty($input['password']))) {
        $firstname = $input["firstname"];
        $lastname = $input["lastname"];
        $email= $input["email"];
        $password = $input["password"];

    } else {
        throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
    }


    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($firstname, $lastname, $email, $password);
    if (!$success) {
        throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
    } else {
        header('Location: templates/login.php');
    }

    
        // Otherwise, it displays the form.
        $userRepository = new UserRepository();
        $userRepository->connection = new DatabaseConnection();
        $user = $userRepository->getUser($id);
        if ($user === null) {
            throw new \Exception("Erreur.");
        }

        require('templates/register.php');



}
}
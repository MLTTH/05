<?php
namespace Application\Controllers\User\Add;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\User\UserRepository;

class RegisterController{
public function execute (array $input)
{
    $firstname = null;
    $lastname = null;
    $email= null;
    $password = null;

    if (!empty($input['firstname']) && !empty($input['lastname']) && !empty($input['email']) && !empty($input['password'])) {
        $firstname = $input["firstname"];
        $lastname = $input["lastname"];
        $email= $input["email"];
        $password = $input["password"];

    } else {
        throw new \Exception('Les données du formulaire sont invalides.');
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($firstname, $lastname, $email, $password);
    if (!$success) {
        throw new \Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php');
    }
}
}
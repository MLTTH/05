<?php
namespace Application\Controllers\Front\ContactController;

require_once('src/lib/database.php');
require_once('src/model/contact.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Contact\ContactRepository;

class ContactController{

public function execute (array $input)
{
    $id = null;
    $lastname = null;
    $firstname = null;
    $email= null;
    $content = null;

    if (empty($input['button'])) {
        require('templates/contact.php');
        return;
    }

    if (!empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['content'])) {

        $lastname = $input["lastname"];
        $firstname = $input["firstname"];
        $email= $input["email"];
        $content = $input["content"];

    } else {
        throw new \Exception('Tous les champs doivent être complétés');
    }


    $contactRepository = new ContactRepository();
    $contactRepository->connection = new DatabaseConnection();
    $success =  $contactRepository->createContact($lastname, $firstname, $email, $content);
    if (!$success) {
        throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
    } else {
        header('Location: templates/contact.php');
    }

        require('templates/contact.php');
}
}
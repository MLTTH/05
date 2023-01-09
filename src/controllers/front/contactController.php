<?php
namespace App\Controllers\Front\ContactController;

require_once('src/lib/database.php');
require_once('src/model/contact.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Contact\ContactRepository;

class ContactController
{

public function execute (array $input)
{
    global $error_sent;
    global $success_sent;
    global $errors;
    $error_sent = false; 
    $success_sent = false;
    $errors = [];

    if (!isset($input['button'])) {
        require('templates/contact.php');
        return;
    }

    if (empty($input['firstname'])){
        $errors['firstname'] = 'ce champ est obligatoire';
    }

    if (empty($input['lastname'])){
        $errors['lastname'] = 'ce champ est obligatoire';
    }

    if (empty($input['email'])){
        $errors['email'] = 'ce champ est obligatoire';
    }

    if (empty($input['content'])){
        $errors['content'] = 'ce champ est obligatoire';
    }
    
    if (!count($errors)) {
        $success_sent = true;
        require('templates/contact.php');
    }
    else if (count($errors)) {
        $error_sent = true;
        require('templates/contact.php');
        return;
    }


    $contactRepository = new ContactRepository();
    $contactRepository->connection = new DatabaseConnection();
    //$success =  $contactRepository->createContact($lastname, $firstname, $email, $content);
    $from = $input['email'];
    $subject = "sujet";
    //$message = "Bonjour " . $input["firstname"] . $input["lastname"];
    $message =  "Bonjour !". $input["firstname"] . $input["lastname"] . " vous a laissé le message suivant : " . $input["content"];
    $success = mail($from, $subject,  $message);
    return $success;

}
}
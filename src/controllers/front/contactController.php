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
    global $errors;
    $id = null;
    $lastname = null;
    $firstname = null;
    $email= null;
    $content = null;
    $error_sent = false; 
    $errors = [];
    if (empty($input['button'])) {
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
    
    if (count($errors)) {
        require('templates/contact.php');
        return;
    }

    // if (!empty($input['lastname']) && !empty($input['firstname']) && !empty($input['email']) && !empty($input['content'])) {

    //     $lastname = $input["lastname"];
    //     $firstname = $input["firstname"];
    //     $email= $input["email"];
    //     $content = $input["content"];

    // } else {
    //     require('templates/contact_invalid.php');
    //     return;
    // }


    $contactRepository = new ContactRepository();
    $contactRepository->connection = new DatabaseConnection();
    //$success =  $contactRepository->createContact($lastname, $firstname, $email, $content);
    $from = $input['email'];
    $subject = "sujet";
    //$message = "Bonjour " . $input["firstname"] . $input["lastname"];
    $message =  $input["firstname"] . $input["lastname"] . "vous a laissé le message suivant : " .$input["content"];
    $success = mail($from, $subject,  $message);
    if ($success) {
        header('Location: index.php');
    } 
    $error_sent = true;
    require('templates/contact.php');
}
}
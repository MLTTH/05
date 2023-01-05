<?php
namespace App\Controllers\User;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\User\UserRepository;
class LoginController{


public function execute ($input)
{

    global $error_sent;
    global $errors; 
    $error_sent = false; 
    $errors = [];

    if (empty($input['button'])) {
        require('templates/login.php');
        return;
    }

    // 01 - Vérifier les champs, remplir tabl erreur si besoin
    // Si err afficher le template avec les err génériques, Sortir 

    if (empty($input['email'])) {
        $errors['email'] = 'ce champ est obligatoire';
    } 
       if (empty($input['password'])){
        $errors['password'] = 'ce champ est obligatoire';
    }

    // 02 - Si tout est ok : 
    // Controller cherche en bdd "user" à partir de son email
    // Si user non trouvé, 
    // message générique login, pass incorrect, retour page login

    // 03 - si user toruvé : 
    // verifier le password
    // appeler verifier password sur l'objet user 
    // pass ok => user en session
    // pass pas ok => erreur sur formulaire

    // else => logout => fin session






    // if(!empty($input["email"]) || !empty($input["password"])) 
    //  {  
    //      header('Location: index.php?action=contact');
    //  }  
    //  else {
    //      header('Location: index.php?action=register');
    //      require('templates/login.php');
    //      return;
    //  }


    $loginRepository = new UserRepository();
    $loginRepository->connection = new DatabaseConnection();
    $success = $loginRepository->getUserbyEmail($input['email']);
    if (!$success) {
         require('templates/login.php');
     } else {
        header('Location: index.php');
     }
}
}

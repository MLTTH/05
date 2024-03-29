<?php  
namespace App\Controllers\User;

require_once('src/lib/database.php');
require_once('src/model/user.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\User\UserRepository;
class LoginController{
    
    public function execute ($input)
{
    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    global $error_sent;
    global $errors; 
    $error_sent = false; 
    $errors = [];
    $_SESSION = [];
    global $emailConnecte;

    if (!empty($emailConnecte)) {
        header('Location: index.php');
        return;
    }

    if (empty($input['button'])) {
        require('templates/login.php');
        return;
    }

    if ((empty($input['email'])) || (empty($input['password']))){
        $errors['email']='ce champ est obligatoire';
        $errors['password']='ce champ est obligatoire';
    } 

    $input['email'] = filter_var($input['email'], FILTER_VALIDATE_EMAIL); // tu me vérifies que c'est bien un email    
    if (!empty($input['email'])){
        //puisque c'est bien un email, si email pas vide
        $userexistant = $userRepository->getUserbyEmail($input['email']); // on vérifie qu'un user est bien en bdd
        if  (!$userexistant){ // si je n'ai pas de user en bdd
        $errors['email'] = 'Nous n\'avons pas trouvé d\'utilisateur lié à cet email'; //affiche erreur 
        }
    } 

    if (!empty($input['email']) && (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)))
        {
        $errors['email'] = 'Vous devez spécifier une adresse email valide';
        }


        if ((!empty($input['email'])) && (!empty($input['password']))) {
            $user= $userRepository->getUserbyEmailPassword($input['email'], $input['password']);
            if ($user) {
                 $_SESSION['email'] = ($user->email);
                 $_SESSION['firstname'] = ($user->firstname);
                 $_SESSION['admin'] = ($user->admin);
             }
             else {
               $errors['email'] = 'Pb d\'authentification';
             }
       
     }

    if (count($errors)) {
        $error_sent = true;
        require('templates/login.php');
    }
    else {
        header('Location: index.php');
    }
}
}

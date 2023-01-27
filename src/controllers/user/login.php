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

    // 01 - Vérifier les champs, remplir tabl erreur si besoin
    // Si err afficher le template avec les err génériques, Sortir 
    
    // if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) //si j'ai un email

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
                 $_SESSION['email'] = ($input['email']);
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
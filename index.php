<?php
//controller file
require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/homepageController.php');
require_once('src/controllers/postController.php');
require_once('src/controllers/user/register.php');
require_once('src/controllers/user/login.php');
require_once('src/controllers/user/logout.php');
require_once('src/controllers/postsController.php');
require_once('src/controllers/addpostController.php');
require_once('src/controllers/front/contactController.php');

//namespace + class
use App\Controllers\Comment\AddCommentController;
use App\Controllers\Comment\UpdateComment;
use App\Controllers\HomepageController\HomepageController;
use App\Controllers\PostController\PostController;
use App\Controllers\User\LoginController;
use App\Controllers\User\LogoutController;
use App\Controllers\User\RegisterController;
use App\Controllers\postsController\PostsController;
use App\Controllers\Front\ContactController\ContactController;
use App\Controllers\AddPostController\AddPostController;

session_start();  
//var_dump($_SESSION);
global $emailConnecte;
$emailConnecte = null;
if (isset($_SESSION['email'])) {
    $emailConnecte = $_SESSION['email'];
}

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new PostController())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddCommentController())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }

                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } elseif ($_GET['action'] === 'register') {
            (new RegisterController())->execute($_POST);
		}  elseif ($_GET['action'] === 'login') {
            (new LoginController())->execute($_POST);
        } elseif ($_GET['action'] === 'logout') {
            (new LogoutController())->execute();
        } elseif ($_GET['action'] === 'posts') {
            (new postsController())->execute();
        } elseif ($_GET['action'] === 'contact') {
                (new ContactController())->execute($_POST);
        } elseif ($_GET['action'] === 'addpost') {
            (new AddPostController())->execute($_POST);
        } elseif ($_GET['action'] === 'validateComment') {
            (new UpdateComment())->execute($_GET['id'], $_GET['postId']);
            
    } 
        else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
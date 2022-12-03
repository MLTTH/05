<?php
//insérer le fichier controller
require_once('src/controllers/comment/add.php');
require_once('src/controllers/comment/update.php');
require_once('src/controllers/homepageController.php');
require_once('src/controllers/postController.php');
require_once('src/controllers/user/register.php');
require_once('src/controllers/postsController.php');

//namespace + class
use Application\Controllers\Comment\Add\AddCommentController;
use Application\Controllers\Comment\Update\UpdateComment;
use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostController\PostController;
use Application\Controllers\User\Add\RegisterController;
use Application\Controllers\postsController\PostsController;

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
		} elseif ($_GET['action'] === 'posts') {
            (new postsController())->execute();
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
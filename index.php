<?php 
	//session_start();
	require_once("spl_autoloader.php");
    use WriterBlog\Controller\PostController;
    use WriterBlog\Controller\CommentController;
    use WriterBlog\Controller\AccountController;
    use WriterBlog\Controller\RegistrationController;


    $PostController = new PostController();
    $commentController  = new CommentController();
    $accountController = new AccountController();
    $registrationController = new RegistrationController();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPost') {
            $PostController->getPost();
        }	elseif ($_GET['action'] == 'createPost') {
           $PostController->setPost();
        }	elseif ($_GET["action"] == "displayComment") {
        	if (isset($_GET['Post']) && $_GET['Post'] > 0) {
        		$commentController->getComment();
        	} else {
                $controller->templateError("Erreur, votre billet n'existe pas.");
        	}
        }	elseif ($_GET['action'] == 'createComment') {
        	$commentController->setComment();
        }	elseif ($_GET['action'] == 'displayAccount') {
        	if ($_SESSION["connected"] == "admin") {
        		$accountController->getAdmin();
        	} elseif ($_SESSION["connected"] == "member") {
                $accountController->getMember();
            }   else {
        		$registrationController->registration();
        	}
        }	elseif ($_GET['action'] == 'registration') {
        	$registrationController->registration();
        }	elseif ($_GET['action'] == 'faq') {
        	$PostController->getFaq();
        }
    } else {
        $PostController->getHome();
    }
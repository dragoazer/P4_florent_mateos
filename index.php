<?php 
	//session_start();
	require_once("spl_autoloader.php");

    use WriterBlog\Controller\PostController;
    use WriterBlog\Controller\CommentController;
    use WriterBlog\Controller\AccountController;
    use WriterBlog\Controller\Controller;


    $PostController = new PostController();
    $commentController  = new CommentController();
    $accountController = new AccountController();
    $controller = new Controller();

    if (isset($_SESSION["connected"]) AND $_SESSION["connected"] == "admin" OR isset($_SESSION["connected"]) AND $_SESSION["connected"] == "member") {
        $connected = "Connecté : ".$_SESSION["name"];
    } else {
        $connected = "Non connecté";
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPost') {
            $PostController->getPost();
        } elseif ($_GET['action'] == 'createPost') {
           $PostController->setPost();
        } elseif ($_GET["action"] == "displayComment") {
        	if (isset($_GET['Post']) && $_GET['Post'] > 0) {
        		$commentController->getComment();
        	} else {
                $controller->templateError("Erreur, votre billet n'existe pas.");
        	}
        } elseif ($_GET['action'] == 'createComment') {
        	$commentController->setComment();
        } elseif ($_GET['action'] == 'login') {
            $accountController->login();
        } elseif ($_GET['action'] == 'displayAccount') {
        	if ($_SESSION["connected"] == "admin") {
        		$accountController->getAdmin();
        	} elseif ($_SESSION["connected"] == "member") {
                $accountController->getMember();
            }   else {
        		$accountController->registration();
        	}
        } elseif ($_GET['action'] == 'registration') {
        	$accountController->registration();
        } elseif ($_GET['action'] == 'faq') {
        	$PostController->getFaq();
        } elseif ($_GET['action'] == 'newRegistration') {
            $accountController->setRegistration();
        } 
    } else {
        $PostController->getHome();
    }

    /*switch ($_GET["action"]) {
        case 'listPost':
             $PostController->getPost();
            break;
        
        default:
            # code...
            break;
    }*/
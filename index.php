<?php 
	session_start();
    
	require_once("spl_autoloader.php");

    use WriterBlog\Controller\PostController;
    use WriterBlog\Controller\CommentController;
    use WriterBlog\Controller\AccountController;
    use WriterBlog\Controller\Controller;


    $PostController = new PostController();
    $commentController  = new CommentController();
    $accountController = new AccountController();
    $controller = new Controller();

    if (isset($_SESSION["connected"]) AND $_SESSION["connected"] == "admin" OR $_SESSION["connected"] == "member") {
        $connected = "Connecté : ".$_SESSION["pseudo"];
    } else {
        $connected = "Non connecté";
    }

    if (isset($_GET["action"])) {

        switch ($_GET["action"]) {
/////////////////////////////////////////// POST //////////////////////////////////////////
            case 'listPost':
                 $PostController->getPost();
                break;
            
            case 'createPost' :
                $PostController->setPost();
                break;

            case 'modifyPost' :
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    $PostController->setModifyPost();
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;

            case 'deletePost' :
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    $PostController->setDeletePost();
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;
/////////////////////////////////////////// COMMENT //////////////////////////////////////////
            case 'createComment' :
                $commentController->setComment();
                break;

            case 'displayComment' :
                if (isset($_GET['post']) && $_GET['post'] > 0) {
                    $commentController->getComment();
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;

            case 'reportedComment' :
                if (isset($_GET['comment']) && $_GET['comment'] > 0) {
                    $commentController->setReportedComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'modifyComment' :
                if (isset($_GET['comment']) && $_GET['comment'] > 0) {
                    $commentController->setModifyComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'deleteComment' :
                if (isset($_GET['comment']) && $_GET['comment'] > 0) {
                    $commentController->setDeleteComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;
/////////////////////////////////////////// LOGIN //////////////////////////////////////////
            case 'login' :
                $accountController->login();
                break;

            case 'newRegistration' :
                $accountController->setRegistration();
                break;

            case 'displayAccount' :
                if ($_SESSION["connected"] === "admin") {
                    $accountController->getAdmin();
                } elseif ($_SESSION["connected"] === "member") {
                    $accountController->getMember();
                }   else {
                    $accountController->registration();
                }
                break;

            case 'registration' :
                $accountController->registration();
                break;
/////////////////////////////////////////// OTHER //////////////////////////////////////////
            case 'faq' :
                $PostController->getFaq();
                break;
        }
    } else {
        $PostController->getHome();
    }
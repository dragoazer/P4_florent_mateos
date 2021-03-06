<?php 
	session_start();

	require_once("spl_autoloader.php");

    use WriterBlog\Controller\PostController;
    use WriterBlog\Controller\CommentController;
    use WriterBlog\Controller\AccountController;
    use WriterBlog\Controller\Controller;
    use WriterBlog\Controller\AdminController;


    $postController = new PostController();
    $commentController  = new CommentController();
    $accountController = new AccountController();
    $adminController = new AdminController();
    $controller = new Controller();

    if (isset($_SESSION["connected"])) {
        $connected = "Connecté : ".$_SESSION["pseudo"];
    } else {
        $connected = "Non connecté";
    }

    if (isset($_GET["action"])) {

        switch ($_GET["action"]) {
/////////////////////////////////////////// POST //////////////////////////////////////////
            case 'listPost':
                $postController->getPost();
                break;
            
            case 'redirectCreatePost' :
                $postController->redirectCreatePost();
                break;

            case 'createPost' :
                $postController->setPost();
                break;

            case 'redirectModifyPost':
                $postController->redirectModifyPost();
                break;

            case 'modifyPost' :
                if (isset($_GET['post']) AND $_GET['post'] > 0) {
                    $postController->setModifyPost(); 
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;

            case 'deletePost' :
                if (isset($_GET['post']) AND $_GET['post'] > 0) {
                    $postController->setDeletePost();
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;
/////////////////////////////////////////// COMMENT //////////////////////////////////////////
            case 'redirectCreateComment':
                $commentController->redirectCreateComment();
                break;

            case 'createComment' :
                $commentController->setComment();
                break;

            case 'displayComment' :
                if (isset($_GET['post']) AND $_GET['post'] > 0) {
                    $commentController->getComment();
                } else {
                    $controller->templateError("Erreur, le billet n'existe pas.");
                }
                break;

            case 'reportedComment' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0 AND isset($_GET['idPost']) AND $_GET['idPost'] > 0) {
                    $commentController->setReportedComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'modifyCommentRedirect':
                $commentController->modifyCommentRedirect();
                break;

            case 'modifyComment' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0  AND isset($_GET['idPost']) AND $_GET['idPost'] > 0) {
                    $commentController->setModifyComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'deleteComment' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0  AND isset($_GET['idPost']) AND $_GET['idPost'] > 0) {
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

            case 'disconnect' :
                $accountController->disconnect();
                break;

            case 'displayAccount' :
                if (!empty($_SESSION["connected"])) {
                    if ($_SESSION["connected"] === "admin") {
                        $accountController->getAdmin();
                    } elseif ($_SESSION["connected"] === "member") {
                        $accountController->getMember();
                    }   else {
                        $accountController->registration();
                    }
                } else {
                    $accountController->registration();
                }
                break;
                
            case 'registration' :
                $accountController->registration();
                break;
/////////////////////////////////////////// ADMIN CONTROL //////////////////////////////////////////

            case 'adminReport' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0 ) {
                    $adminController->reportComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'adminCommentRedirect':
                $adminController->adminCommentRedirect();
                break;

            case 'adminModifyComment' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0 ) {
                    $adminController->modifyComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;

            case 'adminDeleteComment' :
                if (isset($_GET['comment']) AND $_GET['comment'] > 0 ) {
                    $adminController->deleteComment();
                } else {
                    $controller->templateError("Erreur, le commentaire n'existe pas.");
                }
                break;
        }
    } else {
        $postController->getHome();
    }
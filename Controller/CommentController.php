<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;
	use WriterBlog\Model\PostModel;

	class CommentController
	{
		private $commentModel;
		private $postModel; 

		public function __construct ()
		{
			$this->commentModel = new CommentModel();
			$this->postModel = new PostModel();
		}

		public function getComment ()
		{	
			if (isset($_GET['post'])) {
				$dbPost =  $this->postModel->getThePost($_GET['post']);
				$dbComment = $this->commentModel->getComment((int)$_GET['post']);
				require("template/comment.php");
			} else {
				$error = "Erreur, aucun commentaire trouvé.";
				require("template/templateError.php");
			}
			
		}

		public function setComment () 
		{	
			if (!empty($_POST['commentaire']) AND !empty($_GET['idPost'])) {
				$autor = $_SESSION["pseudo"];
				$comment_text = $_POST["commentaire"];
				$idPost = $_GET["idPost"];
				$this->commentModel->setComment($autor, $comment_text, $idPost);
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['idPost']);
			} else {
				$error = "Erreur, vous essayé de commenté un sujet inexistant.";
				require('template/templateError.php');
			}
		}
	}
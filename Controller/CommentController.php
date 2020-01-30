<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;
	use WriterBlog\Controller\PostController;

	class CommentController extends PostController
	{
		private $commentModel; 

		public function __construct ()
		{
			$this->commentModel = new CommentModel();
		}

		public function getComment ()
		{	
			if (isset($_GET['id'])) {
				$dbComment = $this->commentModel->getComment();
				$dbPost =  $this->getPost($_GET['id']);
				require("template/comment.php");
			} else {
				$error = "Erreur, aucun commentaire trouvé.";
				require("template/templateError.php");
			}
			
		}

		public function setComment () 
		{	
			if ($_POST['comment']) {
				$this->commentModel->setComment($autor, $comment_text);
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&billet=".$_GET['billet']);
			} else {
				$error = "Erreur, vous essayé de commenté un sujet inexistant.";
				require('template/templateError.php');
			}
		}
	}
<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;
	use WriterBlog\Model\PostModel;
	use WriterBlog\Entity\Post;
	use WriterBlog\Entity\Comment;

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
				$dataPost =  [];
				$post = new Post($dataPost);
				$post->setId($_GET['post']);
				$dbPost =  $this->postModel->getThePost($post);
				$data = [];
				$comment = new Comment($data);
				$comment->setId_post((int)$_GET['post']);
				$dataComment = $this->commentModel->getComment($comment);
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
				$data = [];
				$comment = new Comment($data);
				$comment->setAutor($autor);
				$comment->setComment_text($comment_text);
				$comment->setId_post($idPost);
				$this->commentModel->setComment($comment);
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['idPost']);
			} else {
				$error = "Erreur, vous essayé de commenté un sujet inexistant.";
				require('template/templateError.php');
			}
		}

		public function setDeleteComment () 
		{
			$data = [];
			$comment = new Comment($data);
			$comment->setId($_GET['comment']);
			$this->commentModel->setDeleteComment($comment);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['idPost']);
		}

		public function setModifyComment ()
		{
			if (!empty($_POST['commentaire'])) {
				$data = [];
				$comment = new Comment($data);
				$comment->setComment_text($_POST['commentaire']);
				$comment->setId($_GET['comment']);
				$this->commentModel->setModifyComment($comment);	
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['idPost']);	
			}
		}

		public function setReportedComment ()
		{
			$data = [];
			$comment = new Comment($data);
			$comment->setId($_GET['comment']);
			$this->commentModel->setReportedComment($comment);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['idPost']);	
		}
	}
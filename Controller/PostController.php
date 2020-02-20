<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\PostModel;
	use WriterBlog\Entity\Post;


	class PostController 
	{
		private $PostModel;

		public function __construct () {
			$this->PostModel = new PostModel();
		}

		public function getHome ()
		{
			require("template/homePage.php");
		}
		
		public function getPost () 
		{
			$posts = $this->PostModel->getPost();
			require("template/forum.php");
		}

		public function getThePost (int $id) 
		{
			$data = [];
			$post = new Post($data);
			$post->setId($id);
			$req = $this->PostModel->getThePost($post);
			return $req;
		}

		public function setPost ()
		{
			if (!empty($_POST["nomBillet"]) AND !empty($_POST["contenuBillet"])) {
				$data = [];
				$post = new Post($data);
				$post->setTitle($_POST["nomBillet"]);
				$post->setContent($_POST["contenuBillet"]);
				$post->setAutor($_SESSION["pseudo"]);
				$this->PostModel->setPost($post);
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=listPost");
			} else {
				$error = "Erreur, vous n'avez pas renseigné tous les champs.";
				require("template/templateError.php");
			}
		}

		public function getFaq ()
		{
			require("template/faq.php");
		}
		
		public function setDeletePost () 
		{
			var_dump($_GET['post']);
		}

	}

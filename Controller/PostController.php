<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\PostModel;

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
			$post = new Post($id);
			$post->setId($id);
			$req = $this->PostModel->getThePost($post);
			return $req;
		}

		public function setPost ()
		{
			if (!empty($_POST["nomBillet"]) AND !empty($_POST["contenuBillet"])) {
				$postName = $_POST["nomBillet"];
				$postContent = $_POST["contenuBillet"];
				$autor = $_SESSION["connected"];
				$this->PostModel->setPost($postName, $postContent, $autor);
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

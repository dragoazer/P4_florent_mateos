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
			$req = $this->PostModel->getThePost($id);
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
		
		public function setDeletePost () 
		{
			$this->PostModel->deletePost($_GET['post']);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=listPost");
		}

		public function redirectCreatePost ()
		{
			require("template/newPost.php");
		}

		public function redirectModifyPost ()
		{
			if (isset($_GET['post']) AND $_GET['post'] > 0) {
				$req = $this->PostModel->getThePost($_GET['post']);
				require("template/modifyPost.php");
			} else {
				$error = "Erreur, aucun chapitre n'a été sélectionné.";
				require("template/templateError.php");
			}
		}

		public function setModifyPost()
		{
			if (isset($_GET['post']) AND $_GET['post'] > 0 AND isset($_POST["content"]) AND isset($_POST["title"])) {
				$data = [];
				$post = new Post($data);
				$post->setId($_GET['post']);
				$post->setTitle($_POST["title"]);
				$post->setContent($_POST["content"]);
				$req = $this->PostModel->setModifyPost($post);
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayComment&post=".$_GET['post']);
			}
		}
	}

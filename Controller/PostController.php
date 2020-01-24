<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\PostModel;
	
	$PostModel = new PostModel();

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
			$this->PostModel->getPost();
			require("template/forum.php");
		}

		public function setPost ()
		{
			$this->PostModel->setPost();
		}

		public function getFaq ()
		{
			require("template/faq.php");
		}
	}

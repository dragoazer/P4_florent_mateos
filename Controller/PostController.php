<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\PostModel;
	
	$PostModel = new PostModel();

	class PostController 
	{
		public function getHome ()
		{
			require("template/homePage.php");
		}
		
		public function getPost () 
		{
			$PostModel->getPost();
		}

		public function setPost ()
		{
			$PostModel->setPost();
		}

		public function getFaq ()
		{
			$PostModel->getFaq();
		}
	}

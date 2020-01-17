<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;

	class CommentController 
	{
		private $commentModel; 

		public function __construct ()
		{
			$this->commentModel = new CommentModel();
		}

		public function getComment ()
		{
			$this->commentModel->getComment();
		}

		public function setComment () 
		{
			$this->commentModel->setComment();
		}
	}
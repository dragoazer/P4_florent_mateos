<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;
	use WriterBlog\Entity\Comment;

	class AdminController 
	{
		private $commentModel;

		public function __construct ()
		{
			$this->commentModel = new CommentModel();
		}

		public function reportComment () 
		{
			$data = [];
			$comment = new Comment ($data);
			$comment->setId($_GET['comment']);
			$this->commentModel->unreportComment($comment);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");	
		}

		public function modifyComment () 
		{
			if (!empty($_POST['commentaire'])) {
				$this->commentModel->setModifyComment($_GET['comment'], $_POST['commentaire']);	
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");	
			}
		}

		public function deleteComment () 
		{
			$this->commentModel->setDeleteComment($_GET['comment']);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");
		}
	}
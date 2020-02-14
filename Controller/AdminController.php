<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\CommentModel;

	class AdminController 
	{
		private $commentModel;

		public function __construct ()
		{
			$this->commentModel = new CommentModel();
		}

		public function reportComment () 
		{
			$this->commentModel->unreportComment($_GET['comment']);
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
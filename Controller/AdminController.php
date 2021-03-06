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
			$this->commentModel->unreportComment($_GET['comment']);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");	
		}

		public function adminCommentRedirect ()
		{
			require('template/adminModifyComment.php');
		}

		public function modifyComment () 
		{
			if (!empty($_POST['commentaire'])) {
				$data = [];
				$comment = new Comment($data);
				$comment->setComment_text($_POST['commentaire']);
				$comment->setId($_GET['comment']);
				$this->commentModel->setModifyComment($comment);	
				header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");	
			}
		}

		public function deleteComment () 
		{
			$this->commentModel->setDeleteComment($_GET['comment']);
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");
		}
	}
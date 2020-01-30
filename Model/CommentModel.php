<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;

	/**
	 * 
	 */
	class CommentModel extends Manager
	{
		public function getComment () 
		{
			$req = $this->dbConnect()->prepare('SELECT autor, comment_text, comment_date FROM comment WHERE id_post=?');
			$req->execute(array(
				$_GET['id'],
			));
			return $req;
		}
	}
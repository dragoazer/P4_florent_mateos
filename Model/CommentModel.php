<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;
	use WriterBlog\Entity\Comment;

	/**
	 * 
	 */
	class CommentModel extends Manager
	{	

		public function getModeration() 
		{
			$req = $this->dbConnect()->prepare('SELECT id, autor, comment_text, comment_date FROM comment WHERE moderation=:moderation');
			$req->execute(array(
				'moderation' => 1,
			));
			$moderationArray = [];
			while ($data = $req->fetch())
    		{
      			$moderationArray[] = new Comment($data);
    		}
			return $moderationArray; 
		}

		public function setComment (string $autor, string $comment_text, string $idPost) :void
		{
			$req = $this->dbConnect()->prepare("INSERT INTO comment(autor, id_post, comment_text, comment_date) VALUES (:autor, :id_post, :comment_text, NOW())");
			$req->execute(array(
				'autor' => $autor,
				'id_post' => $idPost,
				'comment_text' => $comment_text,
			));
		}

		public function getComment (int $post)
		{
			$req = $this->dbConnect()->prepare('SELECT id, autor, comment_text, comment_date, moderation FROM comment WHERE id_post=?');
			$req->execute(array(
				$post,
			));
			$data = new Comment($req->fetch());
			return $data;
		}

		public function setDeleteComment (int $idComment) :void
		{
			$req = $this->dbConnect()->prepare( "DELETE FROM comment WHERE id = :id" );
			$req->execute(array(
				'id' => $idComment,
			));
		}

		public function setModifyComment (int $idComment, string $comment_text) :void
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET comment_text = :comment_text WHERE id = :id");
			$req->execute(array(
				'comment_text' => $comment_text,
				'id' => $idComment,
			));	
		}

		public function setReportedComment (int $idComment) :void
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET moderation = 1 WHERE id= :id");
			$req->execute(array(
				'id' => $idComment,
			));	
		}

		public function unreportComment (int $idComment):void
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET moderation = 0 WHERE id= :id");
			$req->execute(array(
				'id' => $idComment,
			));	
		}
	}
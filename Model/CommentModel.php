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

		public function setComment (Comment $comment) :void
		{
			$req = $this->dbConnect()->prepare("INSERT INTO comment(autor, id_post, comment_text, comment_date) VALUES (:autor, :id_post, :comment_text, NOW())");
			$req->execute(array(
				'autor' => $comment->autor(),
				'id_post' => $comment->id_post(),
				'comment_text' => $comment->comment_text(), 
			));
		}

		public function getComment (int $id_post)
		{
			$req = $this->dbConnect()->prepare('SELECT id, autor, comment_text, comment_date, moderation FROM comment WHERE id_post=?');
			$req->execute(array(
				$id_post,
			));
			while ($data = $req->fetch())
    		{
      			$dataArray[] = new Comment($data);
    		}
			return $dataArray ?? "error";
		}

		public function setDeleteComment (int $id) :void
		{
			$req = $this->dbConnect()->prepare( "DELETE FROM comment WHERE id = :id" );
			$req->execute(array(
				'id' => $id,
			));
		}

		public function setModifyComment (Comment $comment) :void
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET comment_text = :comment_text WHERE id = :id");
			$req->execute(array(
				'comment_text' => $comment->comment_text(),
				'id' => $comment->id(),
			));	
		}

		public function setReportedComment (int $id) :void
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET moderation = 1 WHERE id= :id");
			$req->execute(array(
				'id' => $id,
			));	
		}

		public function unreportComment (int $id) :void 
		{
			$req = $this->dbConnect()->prepare("UPDATE comment SET moderation = 0 WHERE id= :id");
			$req->execute(array(
				'id' => $id,
			));	
		}
	}
<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;

	/**
	 * 
	 */
	class CommentModel extends Manager
	{	

		public function setComment (string $autor, string $comment_text, string $idPost)
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
			$req = $this->dbConnect()->prepare('SELECT id, autor, comment_text, comment_date FROM comment WHERE id_post=?');
			$req->execute(array(
				$post,
			));
			return $req;
		}
	}
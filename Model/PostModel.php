<?php
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;

	/**
	 * 
	 */
	class PostModel extends Manager
	{
		public function getPost ()
		{
			$req = $this->dbConnect()->query('SELECT id, title, content, creation_date, autor FROM post ORDER BY creation_date DESC LIMIT 0, 5');
			return $req;
		}

		public function getThePost (int $id)
		{
			$req = $this->dbConnect()->prepare('SELECT title, content, creation_date FROM post WHERE id=:id ORDER BY creation_date');
			$req->execute(array(
				"id"=>$id,
			));
			$post = $req->fetch();
			return $post;
		}

		public function setPost (string $postName, string $postContent, string $autor) 
		{
			$req = $this->dbConnect()->prepare('INSERT INTO post(title, content, autor, creation_date) VALUES (:title, :content, :autor, NOW())');
			$req->execute(array(
				"title"=>$postName,
				"content"=>$postContent,
				"autor"=>$autor,
			));
		}
	}
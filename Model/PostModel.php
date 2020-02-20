<?php
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;
	use WriterBlog\Entity\Post;
	/**
	 * 
	 */
	class PostModel extends Manager
	{
		public function getPost ()
		{
			$req = $this->dbConnect()->query('SELECT id, title, content, creation_date, autor FROM post ORDER BY creation_date DESC LIMIT 0, 5');
			while ($data = $req->fetch())
    		{
      			$postArray[] = new Post($data);
      		}
			return $postArray ?? "error";
		}

		public function getThePost (Post $post)
		{
			$req = $this->dbConnect()->prepare('SELECT title, content, creation_date FROM post WHERE id=:id ORDER BY creation_date');
			$req->execute(array(
				"id"=>$post->id(),
			));
			$data = new Post($req->fetch());
			return $data;
		}

		public function setPost (Post $post) :void
		{
			$req = $this->dbConnect()->prepare('INSERT INTO post(title, content, autor, creation_date) VALUES (:title, :content, :autor, NOW())');
			$req->execute(array(
				"title"=>$postName,
				"content"=>$postContent,
				"autor"=>$autor,
			));
		}
	}
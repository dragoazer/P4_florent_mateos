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

		public function getThePost (int $id)
		{
			$req = $this->dbConnect()->prepare('SELECT title, content, creation_date FROM post WHERE id=:id ORDER BY creation_date');
			$req->execute(array(
				"id"=>$id,
			));
			$data = new Post($req->fetch());
			return $data;
		}

		public function setPost (Post $post) :void
		{
			$req = $this->dbConnect()->prepare('INSERT INTO post(title, content, autor, creation_date) VALUES (:title, :content, :autor, NOW())');
			$req->execute(array(
				"title"=>$post->title(),
				"content"=>$post->content(),
				"autor"=>$post->autor(),
			));
		}

		public function setModifyPost (Post $post) :void
		{
			$req = $this->dbConnect()->prepare('UPDATE post SET title=:title, content=:content WHERE id=:id ');
			$req->execute(array(
				"title"=>$post->title(),
				"content"=>$post->content(),
				"id" => $post->id(),
			));
		}

		public function deletePost (int $id) :void
		{
			$req = $this->dbConnect()->prepare( "DELETE FROM post WHERE id = :id" );
			$req->execute(array(
				'id' => $id,
			));
			$req = $this->dbConnect()->prepare( "DELETE FROM comment WHERE id_post = :id_post" );
			$req->execute(array(
				'id_post' => $id,
			));

		}
	}
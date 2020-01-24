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
			$req = $this->dbConnect()->query('SELECT id, title, content, creation_date FROM post ORDER BY creation_date DESC LIMIT 0, 5');
			return $req;
		}
	}
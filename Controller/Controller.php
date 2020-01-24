<?php
	namespace WriterBlog\Controller;

	/**
	 * 
	 */
	class Controller  
	{
		public function templateError($error)
		{
			$error = isset($error)? $error : "Erreur" ;
			require("template/templateError.php");
		}
	}
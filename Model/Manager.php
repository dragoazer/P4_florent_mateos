<?php
	namespace WriterBlog\Model\Manager;
	/**
	 * 
	 */
	class Manager 
	{
		protected function dbConnect()
		{
				try {
					$bdd = new \PDO('mysql:host=127.0.0.1;dbname=writerblog;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
				}	
				catch(Exception $e) {
					die('Erreur : '.$e->getMessage());
				}

				return $bdd;
		}
	}	
	
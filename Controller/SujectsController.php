<?php
	namespace writerBlog\Controller\SujectsControler;
	use writerBlog\Model\SujectsModel;
	
	$sujectsModel = new SujectsModel();

	class SujectsControler 
	{
		public function getHome ()
		{
			require("template/forum.php");
		}

		public function getSujects () 
		{
			$sujectsModel->getSujects();
		}

		public function setSujects ()
		{
			$sujectsModel->setSujects();
		}
	}

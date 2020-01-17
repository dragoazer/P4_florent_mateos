<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\AccountModel;

	$accountModel = new AccountModel();

	class AccountController {
		public function getAdmin () 
		{
			$accountModel->getAdmin();
		}

		public function getMember () 
		{
			$accountModel->getMember();
		}
	}
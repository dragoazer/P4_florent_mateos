<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\AccountModel;

	class RegistrationController {

		public function registration() 
		{
			$registrationModel = new AccountModel();
			$registrationModel->registration();
		}
		
	}
<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;

	/**
	 * 
	 */
	class AccountModel extends Manager
	{
		public function registration ()
		{

		}

		public function getAdmin () 
		{
			
		}

		public function getMember () 
		{
			
		}
		
		public function login ()
		{
			$req = $this->dbConnect()->prepare("SELECT first_name, last_name, pseudo, member, email, pwd FROM account WHERE pseudo=? OR email=?");
			$req->execute(array(
				$pseudo,
				$email,
			));
		}

		public function setRegistration ($email,$firstName,$lastName,$pseudo,$pwd)
		{
			$req = $this->dbConnect()->prepare("SELECT first_name, last_name, pseudo, email FROM account WHERE pseudo=? OR email=?");
			$req->execute(array(
				$pseudo,
				$email,
			));
			if ($req->fetch()) {
				$error = "error";
				return $error;
			} else {
				$req = $this->dbConnect()->prepare("INSERT INTO account(first_name, last_name, user_type, pseudo, profile_picture, email, pwd) VALUES (:first_name, :last_name, :user_type, :pseudo, :profile_picture, :email, :pwd)");
				$req->execute([
		        	"first_name"=> $firstName,
		        	"last_name"=> $lastName,
		        	"user_type"=>"member",
		        	"pseudo"=> $pseudo,
		        	"profile_picture"=>"public/images/basicProfile.jpg",
		        	"email"=> $email,
		        	"pwd"=> $pwd,
		    	]);
			}
		}
	}
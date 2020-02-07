<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;

	/**
	 * 
	 */
	class AccountModel extends Manager
	{	

		public function getModeration() 
		{
			$req = $this->dbConnect()->prepare('SELECT id, autor, comment_text, comment_date FROM comment WHERE moderation=:moderation');
			$req->execute(array(
				'moderation' => 1,
			));
			return $req;
		}

		public function getInfoUser () 
		{
			$req = $this->dbConnect()->prepare("SELECT first_name, last_name, user_type, email, pseudo, pwd FROM account WHERE pseudo=:pseudo");
			$req->execute(array(
				'pseudo'=> $_SESSION['pseudo'],
			));
			$fetching = $req->fetch();
			if ($fetching) {
				return $fetching;
			} else {
				$error = "error";
				return $error;
			}
		}
		
		public function login (string $email)
		{
			$req = $this->dbConnect()->prepare("SELECT email, pseudo, user_type, pwd FROM account WHERE pseudo=? OR email=?");
			$req->execute(array(
				$email,
				$email,
			));
			$fetching = $req->fetch();
			if ($fetching) {
				return $fetching;
			} else {
				$error = "error";
				return $error;
			}
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
		        	"profile_picture"=>"public/images/basicProfile.png",
		        	"email"=> $email,
		        	"pwd"=> $pwd,
		    	]);
			}
		}
	}
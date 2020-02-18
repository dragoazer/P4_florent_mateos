<?php	
	namespace WriterBlog\Model;
	use WriterBlog\Model\Manager;
	use WriterBlog\Entity\Account;

	/**
	 * 
	 */
	class AccountModel extends Manager
	{	
		public function getInfoUser () 
		{
			$req = $this->dbConnect()->prepare("SELECT first_name, last_name, user_type, email, pseudo, pwd FROM account WHERE pseudo=:pseudo");
			$req->execute(array(
				'pseudo'=> $_SESSION['pseudo'],
			));
			$data = new Account($req->fetch());
			return $data ?? "error";
		} 
		
		public function login (Account $account)
		{
			$req = $this->dbConnect()->prepare("SELECT email, pseudo, user_type, pwd FROM account WHERE pseudo=? OR email=?");
			$req->execute(array(
				$account->email(),
				$account->email(),
			));
			$data = new Account($req->fetch());
			return $data ?? "error";
		}

		public function setRegistration (Account $account) :string
		{
			$req = $this->dbConnect()->prepare("SELECT first_name, last_name, pseudo, email FROM account WHERE pseudo=? OR email=?");
			$req->execute(array(
				$account->pseudo(),
				$account->email(),
			));
			if ($req->fetch()) {
				return "error";
			} else {
				$req = $this->dbConnect()->prepare("INSERT INTO account(first_name, last_name, user_type, pseudo, profile_picture, email, pwd) VALUES (:first_name, :last_name, :user_type, :pseudo, :profile_picture, :email, :pwd)");
				$req->execute([
		        	"first_name"=> $account->first_name(),
		        	"last_name"=> $account->last_name(),
		        	"user_type"=>"member",
		        	"pseudo"=> $account->pseudo(),
		        	"profile_picture"=>"public/images/basicProfile.png",
		        	"email"=> $account->email(),
		        	"pwd"=> $account->pwd(),
		    	]);
			}
		}
	}
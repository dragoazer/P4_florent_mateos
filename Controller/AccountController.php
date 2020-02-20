<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\AccountModel;
	use WriterBlog\Model\CommentModel;
	use WriterBlog\Entity\Account;

	/**
	 * 
	 */
	class AccountController {
		private $accountModel;
		private $commentModel;
 
		public function __construct ()
		{
			$this->accountModel = new AccountModel();
			$this->commentModel = new CommentModel();
		}

		public function getAdmin () 
		{
			$informations = $this->accountModel->getInfoUser();
			$commentModeration = $this->commentModel->getModeration();
			if ($informations != 'error') {
				require("template/accountAdmin.php");
			}
		}

		public function getMember () 
		{
			$informations = $this->accountModel->getInfoUser();
			if ($informations != 'error') {
				require("template/accountMember.php");			
			}
		}

		public function disconnect ()
		{
			session_destroy();
			header("Location: http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php");
		}

		public function registration() 
		{
			require("template/registration.php");
		}
		public function login ()
		{
			if (!empty($_POST['emailConect']) AND !empty($_POST['pwdConect'])) {
				$email = htmlspecialchars(trim($_POST['emailConect']));
				$pwd = $_POST['pwdConect'];
				$data[]=$email;
				$account = new Account($data);
				$account->setEmail($email);
				$login = $this->accountModel->login($account);
				if ($login != "error") {
					$bddPseudo = $login->pseudo();
					$bddEmail = $login->email();
					$bddUserType= $login->user_type();
					$bddPwd= $login->pwd();
					if (password_verify($pwd, $bddPwd)) {
						 $_SESSION["pseudo"] = $bddPseudo;
						 $_SESSION["connected"] = $bddUserType;
						 header("Location:  http://".$_SERVER['SERVER_NAME']."/p4_florent_mateos/index.php?action=displayAccount");
					} else {
						$error = "Erreur, votre mot de passe ou identifiant est invalide 1";
						require("template/registration.php");
					}
				} else {
					$error = "Erreur, votre mot de passe ou identifiant est invalide.";
					require("template/registration.php");
				}
			} else {
				$error = "Erreur, vous n'avez pas rempli tous les champs.";
				require("template/registration.php");
			}
		}

		public function setRegistration() 
		{
			if (!empty($_POST['email']) AND !empty($_POST['first_name']) AND !empty($_POST['last_name']) AND !empty($_POST['pseudo']) AND !empty($_POST['pwd'])) {
				$account = new Account($_POST);
				$account->setPwd(password_hash ($_POST['pwd'], PASSWORD_DEFAULT));
				$setAccount = $this->accountModel->setRegistration($account);
				if ($setAccount === "error") {
					$error = "Erreur, Votre compte existe déjà.";
					require("template/registration.php");
				} else {
					$error = "Inscription validée, veuillez vous connectez.";
					require("template/registration.php");
				}
			} else {
				$error = "Erreur, vous n'avez pas rempli tous les champs.";
				require("template/registration.php");
			}
		}
	}
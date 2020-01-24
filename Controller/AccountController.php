<?php
	namespace WriterBlog\Controller;
	use WriterBlog\Model\AccountModel;

	class AccountController {
		private $accountModel;

		public function __construct ()
		{
			$this->accountModel = new AccountModel();
		}

		public function getAdmin () 
		{
			$this->accountModel->getAdmin();
		}

		public function getMember () 
		{
			$this->accountModel->getMember();
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
				$login = $this->accountModel->login($email,$pwd);
			}
		}

		public function setRegistration() 
		{
			if (!empty($_POST['email']) AND !empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['pseudo']) AND !empty($_POST['pwd'])) {
				$email = htmlspecialchars(trim($_POST['email']));
				$firstName = htmlspecialchars(trim( $_POST['firstName']));
				$lastName = htmlspecialchars(trim($_POST['lastName']));
				$pseudo = htmlspecialchars(trim($_POST['pseudo']));
				$pwd = password_hash ($_POST['pwd'], PASSWORD_DEFAULT);
				$setAccount = $this->accountModel->setRegistration($email,$firstName,$lastName,$pseudo,$pwd);
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
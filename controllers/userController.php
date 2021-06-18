<?php

	require_once ('models/Category.php'); 
	require_once ('models/User.php'); 

	$categories = getAllCategories();
  $users = getAllUsers();
	$action = $_GET['action'];
	$errors = [];


	if($action == 'login'){

		if(isset($_SESSION['user_info'])) {
			///Pour rediriger au cas ou l'utilisateur tente d'y acceder avec l'url
			header('Location: index.php');
			exit;
		}

		if (!empty($_POST)) {

			$submittedEmail = $_POST['email'];
			$submittedPassword = $_POST['password'];

			if (empty($submittedEmail)) {
				$errors[] = "Merci de renseigner votre Email !";
			}
			elseif (!checkEmailFormat($submittedEmail) )  {
        $errors[] = "L'email n'est pas au bon format !";
      }
			
			if (empty($submittedPassword)) {
				$errors[] = "Merci de renseigner votre mot de passe !";
			}
			
			if (empty($errors)) {
				$user = login($submittedEmail, $submittedPassword);

				if (!$user) {
					$errors[] = "Mauvais Identifiants";
				}
				else {
					$_SESSION['user_info'] = [
						'username' =>  $user['username'],
						'firstname' =>  $user['firstname'],
						'lastname' =>  $user['lastname'],
						'is_admin' =>  $user['is_admin'],
						'id' =>  $user['id'],
					];

					$_SESSION['message'] = 'Salut ' . $_SESSION['user_info']['firstname'] . '!';
					
					header('Location: index.php');
					exit;
				}
			}

		}

		$view = 'views/loginView.php';
	}

	elseif($action == 'edit'){

		$userId = $_GET['id'];

    $selectedUser = getUser($userId);

    $view = 'views/userInfoView.php';

		if($selectedUser == false){
      header('Location: ../index.php?page=404');
      exit;
    }

		if($userId  == ''){
      header('Location: ../index.php?page=404');
      exit;
    }
		
    if(!empty($_POST)){
		
      $submittedUsername = $_POST['username'];
			$submittedFirstname = $_POST['firstname'];
    	$submittedLastname = $_POST['lastname'];
			$submittedEmail = $_POST['email'];
      $submittedPassword = $_POST['password'];
      $submittedBio = $_POST['bio'];
			$submittedPswdConfirmation = $_POST['pswdConfirmation'];

      if (empty($submittedUsername)) {
				$errors[] = "Merci de renseigner le Pseudo !";
      }

			if (empty($submittedFirstname)) {
				$errors[] = "Merci de renseigner le prénom !";
			}

			if (empty($submittedLastname)){
				$errors[] = "Merci de renseigner le nom !";
			}

			if (!empty($submittedEmail)) {
				if(!checkEmailFormat($submittedEmail))  {
					$errors[] = "L'email n'est pas au bon format !";
				}
			}
			else {
				$errors[] = "Merci de renseigner l'Email !";
      }

			if (!empty($submittedPassword)) {
				if (!empty($submittedPswdConfirmation)){
					if ($submittedPassword != $submittedPswdConfirmation) {
					$errors[] = "Les Mots de passes doivent être identiques !";
					}
				}		
				else {
					$errors[] = "Merci de confirmer le mot de passe !";
				}
			}	

			if (empty($errors)) {
				$userId = $_GET['id'];

				$result = updateUser($userId, $_POST);

        if($result){
					// $_SESSION['user_info']['firstname'] = getUser($userId)['firstname'] ;
          $_SESSION['message'] = 'Données utilisateur modifiées.';
          header('Location: index.php?');
          exit;
        }
        else{
          $_SESSION['error'] = 'Impossible de modifier les données utilisateur...';
          header('Location: index.php?');
          exit;
        }
				
			}
    }
  }

	if($action == 'logout'){
		unset($_SESSION['user_info']);
		$_SESSION['message'] = 'Vous êtes bien déconnecté !';
		header('Location: index.php');
		exit;
	}

	if ($action == 'register') {

		if (!empty($_POST)) {

			$submittedUsername = $_POST['username'];
			$submittedFirstname = $_POST['firstname'];
    	$submittedLastname = $_POST['lastname'];
			$submittedEmail = $_POST['email'];
			$submittedBio = $_POST['bio'];
			$submittedPassword = $_POST['password'];
			$submittedPswdConfirmation = $_POST['pswdConfirmation'];


			if (!empty($submittedUsername)) {
				if(usernameVerify($submittedUsername)){
					$errors[] = "Le pseudo existe déja !";
				}
			}
			else {
				$errors[] = "Merci de renseigner votre Pseudo !";
      }

			if (empty($submittedFirstname)) {
				$errors[] = "Le prénom est obligatoire !";
			}

			if (empty($submittedLastname)){
				$errors[] = "Le nom est obligatoire !";
			}
			
			if (empty($submittedBio)){
				$errors[] = "La biographie est obligatoire !";
			}

			if (!empty($submittedEmail)) {

				if(checkEmailFormat($submittedEmail))  {
					
					if(emailVerify($submittedEmail)){
						$errors[] = "L'email existe déja !";
					}
				}
				else {
					$errors[] = "L'email n'est pas au bon format !";
				}
				
			}
			else {
				$errors[] = "Merci de renseigner votre Email !";
      }
			
			if (empty($submittedPassword)) {
				$errors[] = "Merci de renseigner votre mot de passe !";
			}

			if (!empty($submittedPassword)) {
				if (!empty($submittedPswdConfirmation)){
					if ($submittedPassword != $submittedPswdConfirmation) {
					$errors[] = "Les Mots de passes doivent être identiques !";
					}
				}		
				else {
					$errors[] = "Merci de confirmer votre mot de passe !";
				}
			}	

			if (empty($errors)) {

				$register = register($_POST);

				$_SESSION['message'] = 'Vous êtes bien inscrit !';

				header('Location: index.php');
				exit;
				
			}

		}
		$view = 'views/registerView.php';
	}


?>
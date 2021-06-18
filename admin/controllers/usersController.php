<?php

  require_once ('../models/User.php'); 

  $action = $_GET['action'];
  $errors = [];

  if ($action == 'list') {

    $users = getAllUsers();
    $view = 'views/usersListView.php';
    
  }

  elseif ($action == 'new') {

    if(!empty($_POST)){
      
      $submittedUsername = $_POST['username'];
			$submittedFirstname = $_POST['firstname'];
    	$submittedLastname = $_POST['lastname'];
			$submittedEmail = $_POST['email'];
			$submittedPassword = $_POST['password'];
			$submittedPswdConfirmation = $_POST['pswdConfirmation'];

      if (!empty($submittedUsername)) {
				if(usernameVerify($submittedUsername)){
					$errors[] = "Le pseudo existe déja !";
				}
			}
			else {
				$errors[] = "Merci de renseigner le Pseudo !";
      }

			if (empty($submittedFirstname)) {
				$errors[] = "Merci de renseigner le prénom !";
			}

			if (empty($submittedLastname)){
				$errors[] = "Merci de renseigner le nom !";
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
				$errors[] = "Merci de renseigner l'Email !";
      }
			
			if (empty($submittedPassword)) {
				$errors[] = "Merci de renseigner le mot de passe !";
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

				$result = addUser($_POST);
        
        if($result){
          $_SESSION['message'] = 'Utilisateur ajouté !';
          header('Location: index.php?page=users&action=list');
          exit;
        }
        else{
          $_SESSION['error'] = 'Impossible d’ajouter l\'utilisateur...';
          header('Location: index.php?page=users&action=list');
          exit;
        }
				
			}

		}
		$view = 'views/usersFormView.php';
	}

  elseif($action == 'edit'){

		$userId = $_GET['id'];

    $selectedUser = getUser($userId);

    $view = 'views/usersFormView.php';

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
          header('Location: index.php?page=users&action=list');
          exit;
        }
        else{
          $_SESSION['error'] = 'Impossible de modifier les données utilisateur...';
          header('Location: index.php?page=users&action=list');
          exit;
        }
				
			}
    }

    
  }

  elseif($action == 'delete'){

    deleteUser($_GET['id']);
    $_SESSION['message'] = 'Utilisateur suprimé !';
      header('Location: index.php?page=users&action=list');
      exit;
  }

  else{
    header('Location: ../index.php?page=404');
  }

?>


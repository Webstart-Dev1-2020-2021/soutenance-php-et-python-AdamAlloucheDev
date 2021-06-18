<?php
  
	setlocale(LC_ALL, "fr_FR"); #LC_ALL pour heure et jours LC_TIME que pour l'heure
	session_start();
	require_once('../tools.php');

	$db = dbConnect();
	
	if(!isset($_SESSION['user_info']) || $_SESSION['user_info']['is_admin'] == 0) {
		header('Location: ../index.php');
		exit;
	}

	require_once('../tools.php');
		
	if(isset($_GET['page'])){

		$page = $_GET['page'];

		switch ($page){

			case 'categories': 
				require_once('controllers/categoriesController.php');
				break;

			case 'users': 
				require_once('controllers/usersController.php');
				break;
			
				case 'articles': 
				require_once('controllers/postsController.php');
				break;

			case '404': //page contact
				require_once('../controllers/404Controller.php');
				break;

			default : //page par defaut
				header('Location: ../index.php?page=404');
				exit;
		}
	}

	else {
		$page = "";
		require_once('controllers/indexController.php');
	}

	require_once('layouts/admin.php');

	if(isset($_SESSION['message'])){
		unset($_SESSION['message']);
	} 
	if(isset($_SESSION['error'])){
		unset($_SESSION['error']);
	} 

?>


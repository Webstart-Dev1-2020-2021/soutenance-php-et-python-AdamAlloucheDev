<?php
  
	setlocale(LC_ALL, "fr_FR"); #LC_ALL pour heure et jours LC_TIME que pour l'heure
	session_start();
	require_once('tools.php');

	$db = dbConnect();
		
	if(isset($_GET['page'])){

		$page = $_GET['page'];

		switch ($page){

			case 'posts': //page post
				require_once('controllers/postListController.php');
				break;

			case 'post': //page post
				require_once('controllers/postController.php');
				break;

			case 'contact': //page contact
				require_once('controllers/contactController.php');
				break;

			case 'user'://pages user
				require_once('controllers/userController.php');
				break;

			case '404': //page contact
				require_once('controllers/404Controller.php');
				break;

			default : //page par defaut
				header('Location: index.php?page=404');
				exit;
		}
	}

	else {
		$page = "";
		require_once('controllers/indexController.php');
	}

	require_once('layouts/layout.php');

	if(isset($_SESSION['message'])){
		unset($_SESSION['message']);
	} 

?>


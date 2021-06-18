<?php

  require_once ('../models/Category.php'); 

  $action = $_GET['action'];
  $errors = [];

  if ($action == 'list') {

    $categories = getAllCategories();
    $view = 'views/categoriesListView.php';
  }

  elseif ($action == 'new') {

    $view = 'views/categoriesFormView.php';


    if(!empty($_POST)){
      
      $submittedName = $_POST['name'];
      $submittedDescription = $_POST['description'];
      $submittedFile = $_FILES['formFile'];

      if (empty($submittedName)) {
        $errors[] = "Le nom est obligatoire.";
      }
      if (empty($submittedDescription)) {
        $errors[] = "La description est obligatoire.";
      }
      if(empty($submittedFile['tmp_name'])){
        $errors[] = "L'image est obligatoire.";
      }
      else {

        $extention = pathinfo( $submittedFile['name'] , PATHINFO_EXTENSION);
        $allowedextension = ['jpg', 'jpeg', 'gif', 'png'];
      
        if(in_array($extention, $allowedextension)){
      
          if($submittedFile['size'] > 2000000){
            $errors[] =  "Votre fichier est trop lourd";
          }
          else{
          $fileName = time().'.'.$extention;
          move_uploaded_file($submittedFile['tmp_name'], '../assets/images/categories/'.$fileName);
          }
        }
        else{
          $errors[] =  "Votre fichier n'est pas au bon format !";
        }
      }
      if (empty($errors)) {

        $result = addCategory($_POST, $fileName);
        
        if($result){
          $_SESSION['message'] = 'Catégorie enregistrée !';
          header('Location: index.php?page=categories&action=list');
          exit;
        }
        else{
          $_SESSION['error'] = 'Impossible d’enregistrer la catégorie...';
          header('Location: index.php?page=categories&action=list');
          exit;
        }
      }
    }

      
  }

  elseif($action == 'edit'){

    

    if (isset($_GET['id'])) {
      
      $categoryId = $_GET['id'];
      $selectedCategory = getCategory($categoryId);

      if($selectedCategory == false){
        header('Location: ../index.php?page=404');
        exit;
      }
    }
    else {
      header('Location: ../index.php?page=404');
      exit;
    }

    

    if(!empty($_POST)){

      $submittedName = $_POST['name'];
      $submittedDescription = $_POST['description'];
      $submittedFile = $_FILES['formFile'];

      if (empty($submittedName)) {
        $errors[] = "Le nom est obligatoire.";
      }
      if (empty($submittedDescription)) {
        $errors[] = "La description est obligatoire.";
      }

      if(!empty($submittedFile['tmp_name'])){
        $extention = pathinfo( $submittedFile['name'] , PATHINFO_EXTENSION);
        $allowedextension = ['jpg', 'jpeg', 'gif', 'png'];
      
        if(in_array($extention, $allowedextension)){
      
          if($submittedFile['size'] > 2000000){
            $errors[] =  "Votre fichier est trop lourd";
          }
          else{
          $fileName = time().'.'.$extention;
          move_uploaded_file($submittedFile['tmp_name'], '../assets/images/categories/'.$fileName);
          }
        }
        else{
          $errors[] =  "Votre fichier n'est pas au bon format !";
        }
      }
      if (empty($errors)) {

        if(isset($fileName)){

          $categoryId = $_GET['id'];
          $selectedCategory = getCategory($categoryId);
          unlink('../assets/images/categories/'.$selectedCategory['img']);

          $result = updateCategory($_GET['id'], $_POST, $fileName);
        }
        else{
          $result = updateCategory($_GET['id'], $_POST);
        }
        
        if($result){
          $_SESSION['message'] = 'Catégorie bien mise à jour !';
          header('Location: index.php?page=categories&action=list');
          exit;
        }
        else{
          $_SESSION['error'] = 'Impossible de mettre à jour la catégorie...';
          header('Location: index.php?page=categories&action=list');
          exit;
        }
      }
    }
    
    $view = 'views/categoriesFormView.php';
  }

  elseif($action == 'delete'){

    $category = getCategory($_GET['id']);
    unlink('../assets/images/categories/'.$category['img']);
    deleteCategory($_GET['id']);
    $_SESSION['message'] = 'Catégorie suprimée !';
      header('Location: index.php?page=categories&action=list');
      exit;
  }

  else{
    header('Location: ../index.php?page=404');
    exit;
  }

?>


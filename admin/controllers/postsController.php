<?php

  require_once ('../models/Category.php'); 
  require_once ('../models/Post.php'); 
  require_once ('../models/Comment.php'); 
  require_once ('../models/Images.php'); 

  
  $categories = getAllCategories();
  $action = $_GET['action'];
  $errors = [];
  $imageId = '';

  if(isset($_GET['id'])){
    $postId = $_GET['id'];
    $images = getimagesByPostId($postId);
  }

  if ($action == 'list') {

    $posts = getAllPosts();
    $view = 'views/postsListView.php';
  }

  elseif ($action == 'new') {

    $view = 'views/postsFormView.php';


    if(!empty($_POST)){

      $submittedTitle = $_POST['title'];
      $submittedSummary = $_POST['summary'];
      $submittedContent = $_POST['content'];
      $submittedFile = $_FILES['formFile'];
      $submittedIsPublished = $_POST['is_published'];

      if (empty($submittedTitle)) {
        $errors[] = "Le titre est obligatoire.";
      }

      if (empty($submittedSummary)) {
        $errors[] = "Le résumé est obligatoire.";
      }

      if (empty($submittedContent)) {
        $errors[] = "Le contenu est obligatoire.";
      }

      if(isset($_POST['category_id'])){
        $submittedCategory = $_POST['category_id'];
      }
      if (empty($submittedCategory)) {
        $errors[] = "La catégorie est obligatoire.";
      }
      
      if(empty($submittedFile['tmp_name'])){
        $errors[] = "L'image est obligatoire.";
      }
      else {

        $extention = pathinfo( $submittedFile['name'] , PATHINFO_EXTENSION);
        $allowedextension = ['jpg', 'jpeg', 'gif', 'png'];
      
        if(in_array($extention, $allowedextension)){
      
          if($submittedFile['size'] > 2000000){
            $errors[] =  "Votre fichier est trop lourd.";
          }
          else{
          $fileName = 'main_'.time().'.'.$extention;
          move_uploaded_file($submittedFile['tmp_name'], '../assets/images/posts/'.$fileName);
          }
        }
        else{
          $errors[] =  "Votre fichier n'est pas au bon format.";
        }
      }

      if(empty($_FILES["post_images"]['tmp_name'][0])){
        $errors[] = "Les images de galerie sont obligatoires.";
      }

      if (empty($errors)) {

        $userId = $_SESSION['user_info']['id'];
        $result = addPost($_POST, $fileName, $userId);
        addPostCategories($result, $_POST);

        if(!empty($_FILES["post_images"]['tmp_name'][0]) && empty($errors)){

          $files = $_FILES["post_images"];
          $nbFiles = count($files['tmp_name']);
    
          for($i=0 ; $i < $nbFiles ; $i++){
    
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            $extention = pathinfo( $files['name'][$i] , PATHINFO_EXTENSION);
    
            if(in_array($extention, $allowedExtensions)){
            
              if($files['size'][$i] > 2000000){
                $errors[] = substr($files['name'][$i], 0, 15). " est trop lourd.";
              }
              else{
              $galeryFileName = 'galery_'.time().'_'.$i.'.'.$extention;
              move_uploaded_file($files['tmp_name'][$i], '../assets/images/posts/'.$galeryFileName);
              addImages($result, $galeryFileName);
              }

            }
            else{
              $errors[] = substr($files['name'][$i], 0, 15) . "(...)." . $extention . " n'est pas au bon format.";
            }   
          }
        }

        if(empty($errors)){
        
          if($result){
            $_SESSION['message'] = 'Article enregistrée !';
            header('Location: index.php?page=articles&action=list');
            exit;
          }
          else{
            $_SESSION['error'] = 'Impossible d’enregistrer l\'article...';
            header('Location: index.php?page=articles&action=list');
            exit;
          }
        }
      }
    }

      
  }

  elseif($action == 'edit'){

    if (isset($_GET['id'])) {
      
      $postId = $_GET['id'];
      
      $commentsByPostId = getCommentsByPostId($postId);
      $selectedPost = getPost($postId);

      if($selectedPost == false){
        header('Location: ../index.php?page=404');
        exit;
      }
    }
    else {
      header('Location: ../index.php?page=404');
      exit;
    }

    if(!empty($_POST['img_id']) ){

      $deleteImage = $_POST['delete_image'];
      $imageId = $_POST['img_id'];
      $imageName = $_POST['img_name'];

      if(isset($deleteImage)){
        deleteImage($imageId);
        unlink('../assets/images/posts/'.$imageName);
        $_SESSION['message'] = 'Image supprimée !';
      }
    }

    if(!empty($_POST) && empty($_POST['img_id'])){

      $submittedTitle = $_POST['title'];
      $submittedSummary = $_POST['summary'];
      $submittedContent = $_POST['content'];
      $submittedFile = $_FILES['formFile'];
      $submittedIsPublished = $_POST['is_published'];
      
      
      if (empty($submittedTitle)) {
        $errors[] = "Le titre est obligatoire.";
      }

      if (empty($submittedSummary)) {
        $errors[] = "Le résumé est obligatoire.";
      }

      if (empty($submittedContent)) {
        $errors[] = "Le contenu est obligatoire.";
      }

      if(isset($_POST['category_id'])){
        $submittedCategory = $_POST['category_id'];
      }
      if (empty($submittedCategory)) {
        $errors[] = "Au moins une catégorie est obligatoire.";
      }

      if(!empty($submittedFile['tmp_name'])){
        $extention = pathinfo( $submittedFile['name'] , PATHINFO_EXTENSION);
        $allowedextension = ['jpg', 'jpeg', 'gif', 'png'];
      
        if(in_array($extention, $allowedextension)){
      
          if($submittedFile['size'] > 2000000){
            $errors[] =  "Votre fichier est trop lourd.";
          }
          else{
          $fileName = 'main_'.time().'.'.$extention;
          move_uploaded_file($submittedFile['tmp_name'], '../assets/images/posts/'.$fileName);
          }
        }
        else{
          $errors[] = $submittedFile['name'] . " n'est pas au bon format.";
        }
      }

      if (empty($errors)) {

        $selectedPost = getPost($postId);

        if(isset($fileName)){

          unlink('../assets/images/posts/'.$selectedPost['img']);

          updatePost($postId, $_POST, $fileName);
          $result = updatePostCategories($postId, $_POST);
          
        }
        else{
          updatePost($postId, $_POST);
          $result = updatePostCategories($postId, $_POST);
        }
        
        if(!empty($_FILES["post_images"]['tmp_name'][0]) && empty($errors)){

          $files = $_FILES["post_images"];
          $nbFiles = count($files['tmp_name']);
    
          for($i=0 ; $i < $nbFiles ; $i++){
    
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            $extention = pathinfo( $files['name'][$i] , PATHINFO_EXTENSION);
    
            if(in_array($extention, $allowedExtensions)){
            
              if($files['size'][$i] > 2000000){
                $errors[] = substr($files['name'][$i], 0, 15). " est trop lourd.";
              }
              else{
              $galeryFileName = 'galery_'.time().'_'.$i.'.'.$extention;
              move_uploaded_file($files['tmp_name'][$i], '../assets/images/posts/'.$galeryFileName);
              addImages($postId, $galeryFileName);
    
              }
            }
            else{
              $errors[] = substr($files['name'][$i], 0, 15) . "(...)." . $extention . " n'est pas au bon format.";
            }   
          }
        }
    
        if (empty($errors)) {
        
          if($result){
            $_SESSION['message'] = 'Article bien mise à jour !';
            header('Location: index.php?page=articles&action=list');
            exit;
          }
          else{
            $_SESSION['error'] = "Impossible de mettre à jour l'article...";
            header('Location: index.php?page=articles&action=list');
            exit;
          }
        }
      }
    }

    
    
    if(isset($_GET['subaction'])){

      $subaction = $_GET['subaction'];

      if($subaction == 'comdelete'){

        $commentId = $_GET['commentid'];
        deleteComment($commentId);
        $_SESSION['message'] = 'Commentaire supprimé !';


      }
    }
    
    $view = 'views/postsFormView.php';
  }

  elseif($action == 'delete'){

    $post = getPost($_GET['id']);
    
    unlink('../assets/images/posts/'.$post['img']);
    foreach($images as $image){
      unlink('../assets/images/posts/'.$image['file_name']);
    }
    deletePost($_GET['id']);
    $_SESSION['message'] = 'Article supprimé !';
      header('Location: index.php?page=articles&action=list');
      exit;
  }
  
  

  else{
    header('Location: ../index.php?page=404');
    exit;
  }

?>


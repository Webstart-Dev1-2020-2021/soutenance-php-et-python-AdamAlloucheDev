<?php 

  require_once ('models/Category.php'); 
  require_once ('models/Post.php');
  require_once ('models/Comment.php');  
  require_once ('models/User.php'); 

  $categories = getAllCategories();
  // $comments = getAllComments();
  
  if (isset($_SESSION['user_info'])) {
    $user = getUser($_SESSION['user_info']['id']);
  }

  if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $commentsByPostId = getCommentsByPostId($postId);
  }
  else {
    header('Location: index.php?page=404');
    exit;
  }
  
  $post = getPost($postId );
  
  if ($post == false) {
    header('Location: index.php?page=404');
    exit;
  }

  $errors = [];

  if (!empty($_POST)) {
    

    $submittedComment = $_POST['comment'];
    
    if (empty($submittedComment)) {
      $errors[] = "Saisissez du texte pour ajouter un commentaire.";
    }
    else{
      $postId = $_GET['id'];
      addComment($_POST, $_GET['id'], $_SESSION['user_info']['id']);
      $_SESSION['message'] = 'Commentaire ajouté.';
      header('Location: index.php?page=post&id='.$postId);
      exit;

    }
  }
  
  $view = 'views/postView.php'; 

?>


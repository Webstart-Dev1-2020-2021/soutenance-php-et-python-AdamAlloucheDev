<?php 

  require_once ('models/Category.php'); 
  require_once ('models/Post.php'); 

  $categories = getAllCategories();
  $posts= getAllPosts();
  $errors = [];

  if (!empty($_POST)) {

    $submittedFirstname = $_POST['firstname'];
    $submittedLastname = $_POST['lastname'];
    $submittedEmail = $_POST['email'];
    $submittedSubject = $_POST['subject'];
    $submittedMessage = $_POST['message'];
    
    if (empty($submittedFirstname)) {
      $errors[] = "Le prénom est obligatoire !";
    }
    if (empty($submittedLastname)){
      $errors[] = "Le nom est obligatoire !";
    }
    if (empty($submittedEmail)){
      $errors[] = "L'email est obligatoire !";
    }
    if (!empty($submittedEmail)){

      if (checkEmailFormat($submittedEmail) )  {
        $mail = mail($submittedEmail, $submittedSubject, $submittedMessage);
      }
      else {
        $errors[] = "L'email n'est pas au bon format !";
      }
    }
    if (empty($submittedSubject)){
      $errors[] = "L'objet est obligatoire !";
    }
    if (empty($submittedMessage)){
      $errors[] = "Le message est obligatoire !";
    }
  }

  $view = 'views/contactView.php'; 

?>

<?php 

  require_once ('models/Category.php'); 
  require_once ('models/User.php'); 
  require_once ('models/Post.php'); 

  $categories = getAllCategories();
  $latestPosts= getLatestPosts();
  $allPosts = getAllPosts();

  $view = 'views/indexView.php'; 

?>

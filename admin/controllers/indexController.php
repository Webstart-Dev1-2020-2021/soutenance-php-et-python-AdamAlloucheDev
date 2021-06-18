<?php
  require_once ('../models/Category.php'); 
  require_once ('../models/Post.php'); 
  require_once ('../models/Comment.php'); 

  $view = 'views/indexView.php'; 

  $postsCount = count(getAllPosts());
  $categoriesCount = count(getAllCategories());

?>
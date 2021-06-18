<?php 

  require_once ('models/Category.php'); 
  require_once ('models/Post.php'); 

  $categories = getAllCategories();

  if (isset($_GET['category_id'])) {
    
    $categoryId = $_GET['category_id'];
    $selectedCategory= getCategory($categoryId);

    if (!$selectedCategory) {
      header('Location: index.php?page=404');
      exit;
    }

    $posts = getPostsByCategoryId($categoryId);
  }
  else {
    
    $posts = getAllPosts();
  }
  
  

  $view = 'views/postListView.php'; 

?>



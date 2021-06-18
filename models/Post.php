<?php

  function getAllPosts(){
    $db = $GLOBALS['db'] ;
    $query = $db->query("SELECT p.*, u.firstname, u.lastname, GROUP_CONCAT(c.name SEPARATOR ' / ') AS categories
    FROM posts p
    JOIN categories_posts cp ON p.id = cp.post_id
    JOIN categories c ON cp.category_id = c.id
    JOIN users u ON p.user_id = u.id
    GROUP BY p.id
    ORDER BY p.date DESC");
    return 	$query->fetchAll();
  }

  function getLatestPosts(){
    $db = $GLOBALS['db'] ;
    $query = $db->query("SELECT p.*, u.firstname, u.lastname, GROUP_CONCAT(c.name SEPARATOR ' / ') AS categories
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN categories_posts cp ON cp.post_id = p.id
    JOIN categories c ON cp.category_id = c.id
    GROUP BY p.id
    ORDER BY p.date DESC LIMIT 3 ");
    return $query->fetchAll();
  }


  function getPost($postId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT p.*, u.firstname, u.lastname, c.name AS categories
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN categories_posts cp ON cp.post_id = p.id
    JOIN categories c ON cp.category_id = c.id
    WHERE p.id = ?");
    $query->execute([$postId]);
    return $query->fetch();
  }


  function getPostsByCategoryId($categoryId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT p.*, u.firstname, u.lastname
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN categories_posts cp ON cp.post_id = p.id
    JOIN categories c ON cp.category_id = c.id
    WHERE c.id = ?
	  ORDER BY p.date DESC");
    $query->execute([$categoryId]);
    return $query->fetchAll();
  }


  function addPost($data, $fileName, $userId){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO posts (title, summary, content, img, is_published, user_id) VALUES (?, ?, ?, ?, ?, ?)');
    $query->execute(
      [
        $data['title'],
        $data['summary'],
        $data['content'],
        $fileName,
        $data['is_published'],
        $userId
      ]
    );
    $lastInsertId = $db->lastInsertId();

    return $lastInsertId;
  }


  function updatePost($postId, $data, $newFileName = false){
    $db = $GLOBALS['db'] ;

    $queryString = 'UPDATE posts SET title = :new_title, summary = :new_summary, content = :new_content, is_published = :new_is_published'; 
    $queryArray = [ 
      'new_title' => $data['title'], 
      'new_summary' => $data['summary'],
      'new_content' => $data['content'],
      'new_is_published' => $data['is_published'], 
      'post_id' => $postId
    ]; 

    if($newFileName != false){ 
      $queryString .= ' ,img = :new_img'; 
      $queryArray['new_img'] = $newFileName; 
    } 

    $queryString .= ' WHERE id = :post_id'; 

    $query = $db->prepare($queryString); 
    $query->execute($queryArray);

    $lastInsertId = $db->lastInsertId();

    return $lastInsertId;
  }


  function addPostCategories($lastInsertId, $data){
    $db = $GLOBALS['db'] ;
    foreach($data['category_id'] as $category){
      $query = $db->prepare('INSERT INTO categories_posts (post_id, category_id) VALUES (?, ?)');
      $result = $query->execute(
        [
          $lastInsertId,
          $category
        ]
      );
    }
    return $result;
  }

  function updatePostCategories($postId, $data){
    $db = $GLOBALS['db'] ;

    $query = $db->prepare('DELETE FROM categories_posts WHERE post_id = ?');
    $query->execute([$postId]);

    foreach($data['category_id'] as $category){
      $query = $db->prepare('INSERT INTO categories_posts (post_id, category_id) VALUES (?, ?)');
      $result = $query->execute(
        [
          $postId,
          $category
        ]
      );
    }
    
    return $result;
  }


  function deletePost($PostId){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('DELETE FROM posts WHERE id = ?');
    $result = $query->execute( [$PostId] );
    return $result;
  }
?>
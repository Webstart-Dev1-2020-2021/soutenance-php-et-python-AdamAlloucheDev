<?php
  
  function getAllCategories(){
    $db = $GLOBALS['db'];
    $query = $db->query("SELECT *
    FROM categories");
    return 	$query->fetchAll();
  }

  
  function getCategory($categoryId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT *
    FROM categories
    WHERE id = ?");
    $query->execute([$categoryId]);
    return $query->fetch();
  }

  function addCategory($data, $fileName){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO categories (name, description, img) VALUES (?, ?, ?)');
    $result = $query->execute(
      [
        $data['name'],
        $data['description'],
        $fileName
      ]
    );
    return $result;
  }

  function updateCategory($categoryId, $data, $newFileName = false){
    $db = $GLOBALS['db'] ;

    $queryString = 'UPDATE categories SET name = :new_name, description = :new_description'; 
    $queryArray = [ 
      'new_description' => $data['description'], 
      'category_id' => $categoryId, 
      'new_name' => $data['name'] 
    ]; 

    if($newFileName != false){ 
      $queryString .= ' ,img = :new_img'; 
      $queryArray['new_img'] = $newFileName; 
    } 

    $queryString .= ' WHERE id = :category_id'; 

    $query = $db->prepare($queryString); 
    $result = $query->execute($queryArray);

    return $result;
  }



  function deleteCategory($categoryId){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('DELETE FROM categories WHERE id = ?');
    $result = $query->execute( [$categoryId] );
    return $result;
  }
?>
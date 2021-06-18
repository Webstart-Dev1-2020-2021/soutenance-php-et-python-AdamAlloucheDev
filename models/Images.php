<?php

  function getAllImages(){
    $db = $GLOBALS['db'] ;
    $query = $db->query("SELECT pimg.*
    FROM post_images pimg
    ORDER BY created_at DESC");
    return 	$query->fetchAll();
  }

  function getimagesByPostId($postId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT pimg.*
    FROM post_images pimg
    WHERE post_id = ?");
    $query->execute( [$postId] );
    return $query->fetchAll();
  }

  function addImages($postId, $fileName){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO post_images (post_id, file_name) VALUES (?, ?)');
    $result = $query->execute(
      [
        $postId,
        $fileName
      ]
    );  
    return $result;
    
  }


  function deleteImage($imageId){
    $db = $GLOBALS['db'];
    $query = $db->prepare('DELETE FROM post_images WHERE id = ?');
    $result = $query->execute( [$imageId] );
    return $result;
  }

?>
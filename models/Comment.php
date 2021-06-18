<?php

  function getAllComments(){
    $db = $GLOBALS['db'] ;
    $query = $db->query("SELECT pc.*, u.username
    FROM post_comments pc
    JOIN users u ON pc.user_id = u.id
    ORDER BY created_at DESC");
    return 	$query->fetchAll();
  }

  function getCommentsByPostId($postId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT pc.*, u.username, u.firstname, u.lastname
    FROM post_comments pc
    JOIN users u ON pc.user_id = u.id
    WHERE pc.post_id = ?
	  ORDER BY pc.created_at DESC");
    $query->execute( [$postId] );
    return $query->fetchAll();
  }

  function addComment($data, $post_id, $user_id){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO post_comments (content, post_id, user_id) VALUES (?, ?, ?)');
    $result = $query->execute(
      [
        $data['comment'],
        $post_id,
        $user_id
      ]
    );
    return $result;
  }


  function deleteComment($commentId){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('DELETE FROM post_comments WHERE id = ?');
    $result = $query->execute( [$commentId] );
    return $result;
  }

?>
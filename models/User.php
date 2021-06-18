<?php

  function login($email, $password){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute( [ $email ] );

    $user = $query->fetch();
    
    if($user){
      if(password_verify($password, $user['password'])){
        return $user;
      }
    }
    else{
      return false;
    }
    
  }

  
  function register($data){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO users (username, firstname, lastname, email, bio, password) VALUES (?,?,?,?,?,?)');
    $result = $query->execute(
      [
        $data['username'],
        $data['firstname'],
        $data['lastname'],
        $data['email'],
        $data['bio'],
        password_hash($data['password'], PASSWORD_DEFAULT)
      ]
    );
    return $result;
  }


  function addUser($data){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('INSERT INTO users (username, firstname, lastname, email, password, is_admin) VALUES (?,?,?,?,?,?)');
    $result = $query->execute(
      [
        $data['username'],
        $data['firstname'],
        $data['lastname'],
        $data['email'],
        password_hash($data['password'], PASSWORD_DEFAULT),
        $data['is_admin']
      ]
    );
    return $result;
  }



  function updateUser($userId, $data){
    $db = $GLOBALS['db'] ;

    $queryString = 'UPDATE users SET
    username = :new_username,
    firstname = :new_firstname,
    lastname = :new_lastname,
    email = :new_email';

    $queryArray = [
      'new_username' => $data['username'],
      'new_firstname' => $data['firstname'],
      'new_lastname' => $data['lastname'],
      'new_email' => $data['email'],
      'user_id' => $userId
    ];

    if(!empty($data['password'])){
      $queryString .= ' ,password = :new_password'; 
      $queryArray['new_password'] = password_hash($data['password'], PASSWORD_DEFAULT); 
    }
    
    if(!empty($data['is_admin'])){
      $queryString .= ' ,is_admin = :new_admin'; 
      $queryArray['new_admin'] = $data['is_admin']; 
    }
    
    if(!empty($data['bio'])){
      $queryString .= ' ,bio = :new_bio'; 
      $queryArray['new_bio'] = $data['bio']; 
    }

    $queryString .= ' WHERE id = :user_id';

    $query = $db->prepare($queryString); 
    $result = $query->execute($queryArray);
    
    return $result;
  }


  function deleteUser($userId){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('DELETE FROM users WHERE id = ?');
    $result = $query->execute( [$userId] );
    return $result;
  }


  function emailVerify($email){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('SELECT 1 FROM users WHERE email = ?');
    $query->execute( [ $email ] );
    return $query->fetchColumn();
  }


  function usernameVerify($username){
    $db = $GLOBALS['db'] ;
    $query = $db->prepare('SELECT 1 FROM users WHERE username = ?');
    $query->execute( [ $username ] );
    return $query->fetchColumn();
  }


  function getAllUsers(){
    $db = $GLOBALS['db'] ;
    $query = $db->query("SELECT * FROM users");
    return 	$query->fetchAll();
  }

  function getUser($userId) {
	  $db = $GLOBALS['db'] ;
    $query = $db->prepare("SELECT *
    FROM users
    WHERE id = ?");
    $query->execute([$userId]);
    return $query->fetch();
  }

?>
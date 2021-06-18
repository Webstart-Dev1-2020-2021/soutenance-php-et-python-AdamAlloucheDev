<?php

  function dbConnect(){
    try{
      $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root', 
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (Exception $exception) {
      die( 'Erreur : ' . $exception->getMessage() );
    }
    
    $db->query("SET lc_time_names = 'fr_FR'");

    return $db;
  }

  function checkEmailFormat($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  function dateFR($dateString){
    return ucwords(strftime("%A %d %B %G à %H:%M", strtotime($dateString)));
  }

  function reArrayFiles($file){

    $file_array = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
  
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_array[$i][$val] = $file[$val][$i];
        }
    }
    return $file_array;
  }

?>
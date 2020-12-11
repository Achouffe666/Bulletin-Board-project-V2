<?php

include "database/database.php";
global $db;

function get_boards()
{
    global $db;
    global $category_id;
    
    $response = $db->query("SELECT * FROM boards WHERE category_id = $category_id");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;

}



 function last_posted($topic_id){
  global $db;

  $lastMessage = $db->prepare("SELECT creation_date FROM messages WHERE topic_id = $topic_id ORDER BY creation_date DESC LIMIT 0, 1");
  $lastMessage->execute();   
  $last = $lastMessage->fetch();
  
  return $last;
}


?>


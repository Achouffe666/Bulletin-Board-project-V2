<?php


function last_post(){
    global $db;

    $lastMessage = $db->prepare("SELECT creation_date, title, content FROM messages ORDER BY creation_date DESC LIMIT 0, 1");
    $lastMessage->execute();
    $last = $lastMessage->fetch();

    return $last;

}

?>
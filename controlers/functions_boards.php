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
function board_secret()
{
    global $db;
    global $board_id;

    $db->query("SELECT * FROM boards WHERE board_id = $board_id");


    if($board_id==13){
        $result = echo "#";
    }
    else{
        $result = echo "views/topics.php?boardId=<?=$board['id']?>";
    }
    
    return $result;
}

?>


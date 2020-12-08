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
 
?>


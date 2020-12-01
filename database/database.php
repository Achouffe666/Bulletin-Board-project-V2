<?php

$host = "localhost"; 
$dbname = "forum"; 
$user = "root"; 
$pass = "root";

try
{
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
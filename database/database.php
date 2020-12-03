<?php
define('HOST', '188.166.24.55');
define('DB_NAME','bcbb-pink-floyd');
define('USER','bcbb-pink-floyd');
define('PASS','ibk@H-7bVsJf.oeT');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e;
}
?>
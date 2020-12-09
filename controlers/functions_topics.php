<?php
include "../database/database.php";
global $db;
?>
<?php
// link to boards

function get_boards(){
    global $db;
 
    $board_id = $db->query("SELECT * FROM topics WHERE board_id = $_GET[boardId]");
    $board_id -> execute();
    $returned_id = $board_id->fetch();

     $response = $db->query("SELECT name FROM boards WHERE id = $_GET[boardId]");
     $response -> execute();
     $result = $response->fetch();
 
     return($result);

 }

 function get_topic()
{
    global $db;
    $board_id = $_GET['boardId'];
    $response = $db->query("SELECT * FROM topics WHERE board_id = $board_id ORDER BY creation_date DESC ");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;

}



function lock_topic(){

    global $db;
    global $topicId;

    if (isset($_POST['lock'])){
    
    $lock = $db->query("UPDATE topics SET locked=1 WHERE id = $topicId");
    $lock -> execute();
    echo '<script src="../static/js/lock.js"></script>';

}
}


function create_topic(){

    global $db;
    global $boardid;
    
    try {
    if (isset($_POST['formSend'])) {
        $query = $db->prepare('SELECT * FROM topics WHERE board_id=:board_id');
        $query->execute(['board_id' => $_GET['board_id']]);
        $count = $query->rowCount();

       if ($count == 0){
    $query = $db->prepare('INSERT INTO topics(title, board_id, user_id) VALUES (:title,:board_id, :user_id);');
    $query->execute([
        'title' => $_POST['Title'],
        'board_id' => $boardid,
        'user_id' => $_SESSION['id'],
        ]);
?>     
     <div class="alert alert-success" role="alert">
         New Topic succefully created !!
    </div>
<?php
        }
        else{
?>          <div class="alert alert-danger" role="alert"><?=$_POST['Title']?> title already exist</div><?php
        };
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}}

function user_nickname(){

    global $db;
    global $user_id;

    $response = $db->query("SELECT nickname FROM users WHERE id = $user_id");
    $response -> execute();
    $nickname = $response->fetch();

    return($nickname);


}
?>


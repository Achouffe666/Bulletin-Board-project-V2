<?php
include "../database/database.php";
global $db;
?>
<?php
function create_topic(){

    global $db;
    
    try {
    if (isset($_POST['formSend'])) {
        $query = $db->prepare('SELECT * FROM topics WHERE title=:title');
        $query->execute(['title' => $_POST['Title']]);
        $count = $query->rowCount();

       if ($count == 0){
    $query = $db->prepare('INSERT INTO topics(title) VALUES (:title);');
    $query->execute([
        'title' => $_POST['Title'],
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
}}?>

<?php 
        
        function get_topics(){
        global $db;

         $query = $db ->prepare('SELECT * FROM topics');
         $query->execute();
         $topics = $query->fetchAll();

        return($topics);
    }

?>
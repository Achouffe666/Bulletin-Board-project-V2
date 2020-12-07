<?php 

include "../database/database.php";
global $db;



// link from topics to messages
function topic_link(){
    global $db;
 
    $topic_id = $db->query("SELECT * FROM messages WHERE topic_id = $_GET[topicId]");
    $topic_id -> execute();
    $returned_id = $topic_id->fetch();

     $response = $db->query("SELECT title FROM topics WHERE id = $_GET[topicId]");
     $response -> execute();
     $result = $response->fetch();
 
     return $result;
 }
 



function get_user_infos($user_id)
{   
   global $db;
    $req = $db->prepare('SELECT * FROM users WHERE nickname = :nickname');
    $req->execute(array('nickname' => $user_id));
    $user_results = $req->fetchAll();
    return $user_results;
    
}
function get_user_nickname()
{
   global $db;
    $req = $db->prepare('SELECT * FROM users WHERE nickname = :nickname');
    $req->execute(array('nickname' => $_SESSION["id"]));
    
    while($data = $req->fetch())
    {          
        
        echo $data["nickname"];
    }
}

function get_message_avatar()
{
   global $db;
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
                {
                    $user_id = $db->quote($data['user_id']);
                    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
                    $count_message = $db->query("SELECT COUNT(user_id) AS NumberOfMessages FROM messages WHERE user_id = $user_id");
                    while($datas = $response2->fetch())
                        { $avatar= "http://2.gravatar.com/avatar/".md5($datas['email'])."?s=100&";
                          echo $avatar ;
                        }
                }
            
    $response->closeCursor();
            
}
function get_message_position()
{
   global $db;
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $data = $response->fetch();
                
                    $user_id = $db->quote($data['user_id']);
                    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
                    $count_message = $db->query("SELECT COUNT(user_id) AS NumberOfMessages FROM messages WHERE user_id = $user_id");
                    while($datas = $response2->fetch())
                        
                        {  echo $datas['position'];}
                          
                
    $response->closeCursor();
}
function get_message_nickname()
{
   global $db;
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $data = $response->fetch();
    $user_id = $db->quote($data['user_id']);
    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
    $datas = $response2->fetch();
    return $datas;
                    
                
    
}
function get_message_count()
{
   global $db;
    
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
              {
                    $user_id = $db->quote($data['user_id']);
                    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
                    $count_message = $db->query("SELECT COUNT(user_id) AS NumberOfMessages FROM messages WHERE user_id = $user_id");
                    while($datas_count = $count_message->fetch())
                        { echo $datas_count["NumberOfMessages"];}
              } 
    $response->closeCursor();
}

function get_message_autre()
{
   global $db;
    
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;

}
function get_message()
{
    global $db;
    $topics_id = $_GET['topicId'];

   
    $response = $db->query("SELECT messages.id, title, topic_id, path_image, content, messages.user_id,DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date, nickname, position, email FROM messages INNER JOIN users WHERE topic_id = $topics_id && messages.user_id = users.id ORDER BY creation_date DESC LIMIT 0, 3");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;

}

function delete_message()
{
    global $db;
    global $id;
    if (ISSET($_POST["message_deleted"]))
    {
        $db->query("DELETE FROM messages WHERE id = $id ");

    }
    
}

function create_message(){

    global $db;

    if (isset($_POST['record'])) {
       
    global $result;

    $title = $result['title'];
    $content = $_POST['content'];
    $user_id = $_GET['topicId'];
    $topicid = $_GET['topicId'];
    
    $message = $db->prepare("
        INSERT INTO messages(title, content, user_id, topic_id)
        VALUES (:title, :content, :user_id, :topic_id)
    ");
    $message->execute(array(
                        ':title' => $title,
                        ':content' => $content,
                        ':user_id' => 1,
                        ':topic_id' => $topicid
                        ));
   
    echo "Entrée ajoutée dans la table";
 
            
    }
}
?>
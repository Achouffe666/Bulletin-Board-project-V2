<?php 

include "../database/database.php";
global $db;



// link from topics to messages()
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
   
    $response = $db->query("SELECT messages.id, title, topic_id, content, messages.user_id,DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date, nickname, position, email, image_title, image_type, image_data FROM messages INNER JOIN users WHERE topic_id = $topics_id && messages.user_id = users.id ORDER BY creation_date DESC LIMIT 0, 6");
    $response -> execute();
    $result = $response->fetchAll();
    return $result;
}


function delete_message()
{
    global $db;
    
    if (ISSET($_POST["message_deleted"]))
    {
        $id = $_POST["message_deleted"];
        $response = $db->query("DELETE FROM messages WHERE id = $id");
        $response->execute();

    }
    
}

function create_message(){

    global $db;
    if (isset($_SESSION["id"]))
    {
        if (isset($_POST['record'])) {
       
            global $result;
        
            $title = $result['title'];
            $content = $_POST['content'];
            $session_id = $_SESSION['id'];
            $topicid = $_GET['topicId'];
            
            $message = $db->prepare("
                INSERT INTO messages(title, content, user_id, topic_id)
                VALUES (:title, :content, :user_id, :topic_id)
            ");
            $message->execute(array(
                                ':title' => $title,
                                ':content' => $content,
                                ':user_id' => $_SESSION['id'],
                                ':topic_id' => $topicid
                                ));
           
            echo "Entrée ajoutée dans la table";
         
                            }
                          
            
    }
    else
    {
        echo "Vous devez vous logger pour écrire un message";
    }
}
    


    function update_message()
    {
        global $db;
        
        if(ISSET($_POST["message_update"]))
        {
            $new_content= $_POST["message_content"];
            $id = $_POST["message_update"];
            $response = $db->prepare("UPDATE messages SET content = :content WHERE id= :id");
            $response->execute(array(":content"=> $new_content, ":id" => $id));
            
        }
    }

    function message_search()
    {
        global $db;
        if(ISSET($_POST["search"]))
        {
            $research = $_POST["search"];
            $req = $db->prepare("SELECT messages.content, messages.creation_date, users.id, users.email, users.position, users.nickname, users.path_image,users.signature FROM messages 
                         INNER JOIN users ON messages.user_id=users.id
                         WHERE content LIKE '%".$research."%' OR title LIKE '%".$research."%' ");
            $response = $req->execute();
            $datas = $req->fetchAll();
            return $datas;
            

        }
        
    }

function lockedTopic(){
    global $db;

    $topic = $db ->prepare("SELECT locked FROM topics WHERE id = $_GET[topicId]");
    $topic -> execute();
    $islocked = $topic->fetch();

    return $islocked;

}

function double_message(){
    global $db;

    $lastMessage = $db->prepare("SELECT creation_date, user_id, topic_id FROM messages ORDER BY creation_date DESC LIMIT 0, 1");
    $lastMessage->execute();
    $last = $lastMessage->fetch();

    return $last;

}

function get_reaction(){
    global $db;
    global $post_id;

    $reactions = $db->prepare("SELECT * FROM reactions WHERE post_id = $post_id");
    $reactions->execute();
    $reaction = $reactions->fetchAll();

    return $reaction;
}

function count_reaction($post_id, $emoji){
    global $db;
    $number = $db->prepare("SELECT * FROM reactions WHERE post_id = :post_id  && emoji = :emoji");
    $number->execute(array(
        ':post_id' => $post_id,
        ':emoji' => $emoji,
        ));    
        
    $count = $number->rowCount();
    return $count;
}

function users_reaction($post_id){
    global $db;
    $number = $db->prepare("SELECT * FROM reactions WHERE post_id = :post_id  && user_id = :user_id");
    $number->execute(array(
        ':post_id' => $post_id,
        ':user_id' => $_SESSION['id'],
        ));    
        
    $count = $number->rowCount();
    return $count;
}


function add_reaction($emoji,$post_id){
    global $db;
  
        $reaction = $db->prepare("INSERT INTO reactions(post_id, emoji, user_id) VALUES (:post_id, :emoji, :user_id)");
        $reaction->execute(array(
                            ':post_id' => $post_id,
                            ':emoji' => $emoji,
                            ':user_id' => $_SESSION['id']
                            ));     
}

function del_reaction($user_id, $post_id){
    global $db;

    $response = $db->query("DELETE  FROM reactions WHERE post_id = $post_id && user_id = $user_id");
    $response->execute();
}

function generate_buttons($post_id){

    if(isset($_POST['like-' . $post_id]) ){
        if(users_reaction($post_id) == 0){
        add_reaction("like",$post_id);}
        else{
        del_reaction($_SESSION['id'], $post_id);
        }
    }

    elseif(isset($_POST['dislike-' . $post_id])){
       if(users_reaction($post_id) == 0){
        add_reaction("dislike",$post_id);}
        else{
        del_reaction($_SESSION['id'], $post_id);
        }
        
    }
    elseif(isset($_POST['love-' . $post_id])){
        if(users_reaction($post_id) == 0){
        add_reaction("love",$post_id);}
        else{
        del_reaction($_SESSION['id'], $post_id);
        }
        
    }
    elseif(isset($_POST['angry-' . $post_id])){
        if(users_reaction($post_id) == 0){
        add_reaction("angry",$post_id);}
        else{
        del_reaction($_SESSION['id'], $post_id);
        }
        
    }
    elseif(isset($_POST['sad-' . $post_id])){
       if(users_reaction($post_id) == 0){
        add_reaction("sad",$post_id);}
        else{
        del_reaction($_SESSION['id'], $post_id);
        }
        
    }

    ?>
     <!-- bouton des emojis -->
        <div class="container d-flex emojis" style="margin-top:10px;margin-bottom: 30px;">

            <form method="post" action=" ">
                <button type="submit" class="like" id="like-<?=$post_id;?>" value="like" name="like-<?=$post_id;?>"><img class="like"  src="../static/image/like.svg" alt="Like"> <?= count_reaction($post_id, "like");?></button>
                <button type="submit" class="dislike" id="dislike-<?=$post_id;?>" value="dislike" name="dislike-<?=$post_id;?>"><img class="dislike"  src="../static/image/dislike.svg" alt="dislike">  <?= count_reaction($post_id, "dislike");?> </button>
                <button type="submit" class="love" id="love-<?=$post_id;?>" value="love" name="love-<?=$post_id;?>"><img class="love"  src="../static/image/heart.svg" alt="love">  <?= count_reaction($post_id, "love") ;?></button>
                <button type="submit" class="angry" id="angry-<?=$post_id;?>" value="angry" name="angry-<?=$post_id;?>"><img class="angry"  src="../static/image/angry.svg" alt="angry">  <?= count_reaction($post_id, "angry");?> </button>
                <button type="submit" class="sad" id="sad-<?=$post_id;?>" value="sad" name="sad-<?=$post_id;?>"><img class="sad"  src="../static/image/crying.svg" alt="sad">  <?= count_reaction($post_id, "sad");?> </button>
            </form>

        </div>
<?php
}





?>
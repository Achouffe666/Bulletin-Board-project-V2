<?php 

function get_user_infos($user_id)
{   
    include "../database/database.php";
    $req = $db->prepare('SELECT * FROM users WHERE nickname = :nickname');
    $req->execute(array('nickname' => $user_id));
    $user_results = $req->fetchAll();
    return $user_results;
    
}
function get_user_nickname()
{
    include "../database/database.php";
    $req = $db->prepare('SELECT * FROM users WHERE nickname = :nickname');
    $req->execute(array('nickname' => $_SESSION["id"]));
    
    while($data = $req->fetch())
    {          
        
        echo $data["nickname"];
    }
}

function get_message_avatar()
{
    include "../database/database.php";
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
    include "../database/database.php";
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
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $data = $response->fetch();
    $user_id = $db->quote($data['user_id']);
    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
    $datas = $response2->fetch();
    return $datas;
                    
                
    
}
function get_message_count()
{
    include "../database/database.php";
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
    include "../database/db.php";
    
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;

}
function get_message()
{
    include "../database/db.php";

    $response = $db->query("SELECT messages.id, title, content, messages.user_id,DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date, nickname, position, email FROM messages INNER JOIN users WHERE messages.user_id = users.id ORDER BY creation_date DESC LIMIT 0, 3");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;


}
?>
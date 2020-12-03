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
function get_message_title()
{
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $data = $response->fetch();
                
                    
                    echo $data['title'];
                    
                
    $response->closeCursor();
}
function get_message_content()
{
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
                {
                    
                    echo $data['content'];
                    
                };
    $response->closeCursor();
}
function get_message_signature()
{
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
                {
                    $user_id = $db->quote($data['user_id']);
                    $response3 = $db->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                    while($datas = $response3->fetch())
                    { echo $datas['signature'];}
                    
                };
    $response->closeCursor();
}
function get_message_creation_date()
{
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
                {
                    echo $data['creation_date'];
                };
    $response->closeCursor();
}
function get_message_id()
{
    include "../database/database.php";
    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    while($data = $response->fetch())
                {
                   
                    $response4 = $db->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                    while($datas = $response4->fetch())
                    {
                    if ($datas['id'] == $_SESSION["id"]) 
                    {echo $data['id'];}
                }
                };
    $response->closeCursor();
}

function get_message_autre()
{
    include "../database/database.php";
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
                          echo $datas['position'];
                          echo $datas['nickname'];}
                    while($datas_count = $count_message->fetch())
                        { echo $datas_count["NumberOfMessages"];}
                    echo $data['title'];
                    echo $data['content'];
                    $response3 = $db->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                    while($datas = $response3->fetch())
                    { echo $datas['signature'];}
                    echo $data['creation_date'];
                    $response4 = $db->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                    while($datas = $response4->fetch())
                    
                   { if ($datas['id'] == $_SESSION["id"]) 
                    {echo $data['id'];}
                }
                };
    $response->closeCursor();
}
function get_message()
{
    include "../database/database.php";

    $response = $db->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
    $response -> execute();
    $result = $response->fetchAll();

    return $result;


}
function get_message_nickname()
{
    include "../database/database.php";
    
    $results = get_message();
                
                    $user_id = $db->quote($results[user_id]);
                    $response2 = $db->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
                    $count_message = $db->query("SELECT COUNT(user_id) AS NumberOfMessages FROM messages WHERE user_id = $user_id");
                    $datas = $response2->fetchAll();
                    return $datas;
                    // while($datas = $response2->fetch())
                    //     { 
                    //       echo $datas['nickname'];
                    //     }
                    
                
    $response->closeCursor();
}
?>
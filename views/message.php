<?php 
    session_start();
   
   
?>
<?php include "header.php"; ?>

<div class="container-fluid overlay">
        <div class="breadcrumb">
            <nav aria-label="breadcrumb container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="inscription.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="topic.php">Topic</a></li>
                    <li class="breadcrumb-item"><a href="message.php">Message</a></li>
                </ol>
            </nav>
        </div>
        <?php 
            
            $host = "localhost"; 
            $dbname = "forum"; 
            $user = "root"; 
            $pass = "root";
            
            try{
                
                    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
             catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            
        ?>
        <div class="row">
            <div class="col col-md-2">
                <button id="button_reply" type="submit" class="btn  btn-outline-info  button-reply" name="post_reply">Post reply</button>
            </div>
            <div class="col col-6-md search">
                <form action="message_search.php" method="post">
                    <div class="form-group" >
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" id="search" value="" name="search">
                            <button type="submit" class="btn btn-update mb-2"><img src="../images/search.svg" alt="search"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php 
                $host = "localhost"; 
                $dbname = "forum"; 
                $user = "root"; 
                $pass = "root";

                try
                {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $response = $pdo->query("SELECT id, title, content, user_id, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%i') AS creation_date, DATE_FORMAT(edition_date, '%d/%m/%Y à %Hh%i') AS edition_date FROM messages ORDER BY creation_date DESC LIMIT 0, 3");
                $req = $pdo->prepare('SELECT * FROM users WHERE nickname = :nickname');
                $req->execute(array('nickname' => $_SESSION["id"]));
                
                while($data = $req->fetch())
                {          
         ?>
        
        <div class="row content row-content justify-content-center ">
                <div class="row row-message row-message2">
                    <div class="col-2 col-content-message">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src="../images/avatar_autre.jpg" style="width: 150px;" alt="avatar_autre">
                        <p name="message-position"><?php echo $data["position"];?></p>
                        <p name="message-identity"><?php echo $data["nickname"];}?></p>
                    </div>
                    <div class="col-10 col-content-message row-message2">
                        <form method="post" action="message_post.php">
                            <p>Titre :</p>
                            <input type="text" class="form-control" name="message_name">
                            <p>Write your message</p>
                            <textarea class="form-control" name="content"></textarea>
                            <button id="record" type="submit" class="btn btn-outline-info mb-2">Sauvegarder</button>
                            <button id="cancel" type="submit" class="btn btn-outline-warning mb-2">Annuler</button>
                        </form>
                    </div>
                </div>
            
            <?php while($data = $response->fetch())
                {
                    $user_id = $pdo->quote($data['user_id']);
                    $response2 = $pdo->query("SELECT id, nickname, position,email FROM users WHERE id=" . $user_id  );
                    $count_message = $pdo->query("SELECT COUNT(user_id) AS NumberOfMessages FROM messages WHERE user_id = $user_id");
            ?>

               <div class="row row-message">
                    <div class="col-2 col-content-message">
                        <?php while($datas = $response2->fetch())
                        { $avatar= "http://2.gravatar.com/avatar/".md5($datas['email'])."?s=100&"?>
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php echo $avatar ?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php echo $datas['position']?></p>
                        <p class="message-identity"><?php echo $datas['nickname'];} ?></p>
                        <p class="message-number"><?php while($datas_count = $count_message->fetch()){ echo $datas_count["NumberOfMessages"];} ?> post(s)</p>
                    </div>
                    <div class="col-10 col-content-message content-message2">
                        <p><?php echo $data['title'];?></p>
                        <p><?php echo $data['content'];?></p>
                        <?php 
                        $response3 = $pdo->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                        while($datas = $response3->fetch())
                        { ?>
                        <p class="message-signature"><?php echo $datas['signature'];}?></p>
                        <p><?php echo $data['creation_date'];?></p>
                        <?php 
                        $response4 = $pdo->query("SELECT id, nickname, signature, position FROM users WHERE id=" . $data['user_id']);
                        while($datas = $response4->fetch())
                        
                        if ($datas['id'] == $_SESSION["id"]) 
                        {
                        ?>
                        <button id="delete" type="submit" name="message_deleted"  class="btn btn-outline-warning mb-2">
                            <a href="message_delete.php?id=<?php echo $data['id']?>">Annuler</a> 
                        </button>
                        <?php } ?>
                    </div>
                </div>
                <?php 
                };
                 $response->closeCursor(); // Termine le traitement de la requête
                }
                
                catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
             ?>

             </div>  
            
    </div>
    
  <?php include "footer.php"; ?>
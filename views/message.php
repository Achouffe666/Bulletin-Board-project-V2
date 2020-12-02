<?php 
    session_start();
   
   
?>
<?php include "header.php"; 
   
?>

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
        <?php include "../database/database.php";
            include "../controlers/functions_message.php";
            global $db;
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
       
        
        <div class="row content row-content justify-content-center ">
                <div class="row row-message row-message2">
                    <div class="col-2 col-content-message">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src="../images/avatar_autre.jpg" style="width: 150px;" alt="avatar_autre">
                        <p name="message-position"><?php get_user_position()?></p>
                        <p name="message-identity"><?php get_user_nickname()?></p>
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
            
           
               <div class="row row-message">
                    <div class="col-2 col-content-message">
                       
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php 
                        get_message_avatar() ?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php get_message_position();?></p>
                        <p class="message-identity"><?php get_message_nickname(); ?></p>
                        <p class="message-number"><?php get_message_count()?> post(s)</p>
                    </div>
                    <div class="col-10 col-content-message content-message2">
                        <p><?php get_message_title()?></p>
                        <p><?php get_message_content()?></p>
                        <p class="message-signature"><?php get_message_signature();?></p>
                        <p><?php get_message_creation_date();?></p>
                       
                        <button id="delete" type="submit" name="message_deleted"  class="btn btn-outline-warning mb-2">
                            <a href="message_delete.php?id=<?php get_message_id()?>">Annuler</a> 
                        </button>
                        
                    </div>
                </div>
               

             </div>  
            
    </div>
    
  <?php include "footer.php"; ?>
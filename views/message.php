<?php 
    session_start();
   
   
?>
<?php include "header.php"; ?>

<div class="container-fluid overlay position-relative rounded-lg main__wrap d-flex flex-column">
    
    <nav class="nav__list">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Board Index</a></li>
            <li class="breadcrumb-item"><a href="#">Category One</a></li>
            <li class="breadcrumb-item">Forum One</li>
        </ol>
    </nav>

    <?php include "../database/database.php";
        include "../controlers/functions_message.php";
        global $db;
    ?>

    <div class="board__inner row">

        <div class="board__wrap col-xl-9 mr-0 mb-2">

            <!-- MESSAGES WRAP -->
            <div class="container row-content justify-content-center ">
<?php 
$infos_message = get_message();
foreach($infos_message as $infos)
{
?>
                <!-- MESSAGE CREATE -->
                <div class="row row-message row-message2 mb-5 p-2 bg-light">
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
                <!-- END MESSAGE CREATE -->
<?php } ?>
                <!-- MESSAGE START -->
                <div class="row row-message mb-2 bg-light pt-2 pr-2">

                    <div class="col-2 col-content-message">
                   
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php 
                        get_message_avatar() ?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php get_message_position();?></p>
                        <p class="message-identity"><?php get_message_nickname(); ?></p>
                        <p class="message-number"><?php get_message_count()?> post(s)</p>

                    </div>

                    <div class="col-10 col-content-message content-message2">

                        <div class="row'">
                            <p class="col-3"><?php get_message_title()?></p>
                            <p class="col-6"><?php get_message_content()?></p>
                            <p class="message-signature col-2"><?php get_message_signature();?></p>
                            <p class="col-1"><?php get_message_creation_date();?></p>
                        </div>

                        <div class="row"> 
                            <p class="message__content">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.

                            </p>
                        </div>

                        <button id="delete" type="submit" name="message_deleted"  class="btn btn-outline-warning mb-2">
                            <a href="message_delete.php?id=<?php infos["id"];?>">Annuler</a> 
                        </button>
                        
                    </div>

                </div>
                <!-- END MESSAGE EXEMPLE -->
            </div>
            <!-- END MESSAGE WRAP -->

        </div>
        <!-- END BOARD__WRAP -->

        <?php include "rightcol.php";?>
    </div>
    <!-- END BOARD__INNER -->  
</div>
<!-- END MAIN WRAP -->
  <?php include "footer.php"; ?>  

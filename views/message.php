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

    <?php 
        include "../controlers/functions_message.php";
        
    ?>

    <div class="row mb-2">
        <div class="col col-md-2">
            <button id="button_reply" type="submit" class="button--modifier px-3 py-1  btn-outline-info  button-reply" name="post_reply">Post reply</button>
        </div>
            
        <div class="col col-6-md search">
            <form action="message_search.php" method="post">
                <div class="form-group" >
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" id="search" value="" name="search">
                        <button type="submit" class="button--modifier btn-update"><img src="../images/search.svg" alt="search"></button>
                    </div>
                </div>
            </form>
        </div>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <div class="board__inner row">

        <div class="board__wrap col-xl-9 mr-0 mb-2">
       
            <!-- MESSAGES WRAP -->
            <div class="container row-content justify-content-center ">

                <!-- MESSAGE CREATE -->
                <div class="row row-message row-message2 mb-5 p-2 bg-light">
         
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
            <!-- END  OF MESSAGE CREATE -->
<?php 
        $result = get_message();
        foreach($result as $results){
            $user_results = get_user_infos($results["user_id"]);
            var_dump($user_results);
?>

                <!-- MESSAGE START -->
                <div class="row row-message mb-2 bg-light pt-2 pr-2">

         

                    <div class="col-2 col-content-message">
                   
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src= <?php echo "$results[id]";?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php echo" $results[title]" ;?></p>
                        <p class="message-identity"><?php  echo" $results[id]"; ?></p>
                        <p class="message-number"><?php  echo" $results[title]"?> post(s)</p>

                    </div>

                    <div class="col-10 col-content-message content-message2">

                        <div class="row">
                            <p class="col-3"><?php  echo" $results[title]"?></p>
                            <p class="col-6"><?php $results['content']?></p>
                            <p class="message-signature col-2"><? $results['creation_date'] ?></p>
                            <p class="col-1"><?php  $results['id'] ?></p>
                        </div>
                       

                        <div class="row"> 
                            <p class="message__content">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            </p>
                        </div>

                     
            
                        <button id="delete" type="submit" name="message_deleted"  class="btn btn-outline-warning mb-2">
                            <a href="message_delete.php?id=<?php echo $results["user_id"];?>">Annuler</a> 
                        </button>
                        
                    </div>
                   
                </div>
                <!-- END MESSAGE EXEMPLE -->
                <?php ;}?>
            </div>
            <!-- END MESSAGE WRAP -->

        </div>
        <!-- END BOARD__WRAP -->

        <?php include "rightcol.php";?>
    </div>
    <!-- END BOARD__INNER -->  
</div>
<!-- END MAIN WRAP -->
<script src="../static/js/javascript.js"></script>
<?php include "footer.php"; ?>  

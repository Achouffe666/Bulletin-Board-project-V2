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

    <div class="row mb-2 ml-2">
        <div class="col col-md-2">
            <button id="button_reply" type="submit" class="button--modifier px-3 py-1  rounded rounded-pill  btn-outline-info  button-reply" name="post_reply">Post reply</button>
        </div>
            
          <div class="bg-light rounded rounded-pill border ml-3">

            <div class="input-group">

              <input type="search" placeholder="Search this forum..."
                class="form-control bg-transparent rounded-pill border-0">

              <div class="input-group-append">

                <button id="search-glass" type="submit" class="btn btn-link border-right border-left">
                  <i class="fa fa-search magnifying-glass"></i>
                </button>

                <button id="cogoption" type="submit" class="btn btn-link">
                  <i class="fas fa-cog cog"></i>
                </button>

              </div>

            </div>

          </div>

    </div>

    <div class="board__inner row">

        <div class="board__wrap col-xl-9  bg-light mr-0 mb-2">
       
            <!-- MESSAGES WRAP -->
            <div class="container row-content justify-content-center ">

                <!-- MESSAGE CREATE -->
                <div class="row row-message row-message2 mb-5 p-2 rounded">
         
                <div class="col-10 col-content-message">
                    <form method="post" action="message_post.php">
                        <p>Write your message</p>
                        <textarea class="form-control" name="content"></textarea>
                        <button id="record" type="submit" class="btn btn-outline-info mb-2">Sauvegarder</button>
                    </form>
                    <button id="cancel" type="submit" class="btn btn-outline-warning mb-2">Annuler</button>
                </div>
            </div>
            <!-- END  OF MESSAGE CREATE -->
<?php 
        $result = get_message();
        foreach($result as $results){ 
            
?>

                <!-- MESSAGE START -->
                <div class="row row-message mb-2 bg-light pt-2 pr-2">

         

                    <div class="col-2 col-content-message">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php 
                        echo "http://2.gravatar.com/avatar/".md5($results['email'])."?s=100&" ;?> style="width: 150px;" alt="avatar_autre">
                        <p class="message-position"><?php echo "$results[position]";?></p>
                        <p class="message-identity"><?php echo "$results[nickname]";?></p>
                       
                        <p class="message-number"><?php ?> post(s)</p>

                    </div>
                    
                    <div class="col-10 col-content-message content-message2">

                        <div class="row">
                            <p class="message-signature col-4"><?php  echo" $results[creation_date]"?></p>
                        </div>

                        <div class="row"> 
                            <p class="message__content">
                            <?php echo "$results[content]"?>
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

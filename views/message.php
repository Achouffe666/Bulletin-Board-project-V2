<?php 
    session_start();
   
   
?>
<?php include "header.php"; ?>
<?php include "../controlers/functions_message.php";?>

<?php $result = topic_link();?>

<div class="container-fluid overlay position-relative rounded-lg main__wrap shadow d-flex flex-column pl-1 pb-2">
    
    <nav class="nav__list">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="breadcrumb-item"><a href="topics.php"><?=$result['title']?></a></li>
            <li class="breadcrumb-item active">Messages</li>
        </ol>
    </nav>
    <h4 class="mt-2 mb-5 ml-5 text-black-50 topic__title"><?=$result['title']?></h4>


    <div class="row mb-2 ml-4">
        <div class="col col-md-2">
            <button id="button_reply" type="submit" class="button--modifier px-3 py-2  rounded rounded-pill  border-0  button-reply" name="post_reply">Post reply <i class="fas fa-pencil-alt"></i></button>
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

    <div class="board__inner row p-2 ml-2">

        <div class="board__wrap col-xl-9 b-radius bg-light pt-1 mr-0 mb-2">
       
            <!-- MESSAGES WRAP -->
            <div class="container row-content justify-content-center ">

                <!-- MESSAGE CREATE -->
                <?php 
                create_message();?>
                <div class="row row-message row-message2 mb-5 p-2 ">
         
                <div class="col-10 col-content-message">
                    <form method="post" action=" ">
                        <p>Write your message</p>
                        <?php  include '../markdown/Michelf/Markdown.inc.php';?>

                        <textarea class="form-control markItUp" id="#bbcode" name="content"></textarea>
                        <input type="submit" name="record" id="record" class="btn btn-outline-info mb-2" value="Save">
                    </form>
                    <button id="cancel" type="submit" class="btn btn-outline-warning mb-2">Annuler</button>
                </div> 
            </div>
            <!-- END  OF MESSAGE CREATE -->
<?php 
        delete_message();
        $result = get_message();
        foreach($result as $results){ 
            
?>

                <!-- MESSAGE START -->
                <div class="row row-message mb-2 b-radius bg-white shadow-sm pt-2 pr-2">

         

                    <div class="col-2 col-content-message d-flex flex-column justify-content-center">
                        <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php 
                        "../static/uploads/" .$results["path_image"]."";?>  alt="avatar_autre">
                        <p class="message-position justify-content-center text-black-50"><?php echo "$results[position]";?></p>
                        <p class="message-identity  justify-content-center text-black-50"><?php echo "$results[nickname]";?></p>
                        <p class="message-number justify-content-center text-black-50"><?php echo "$results[id]";?> post(s)</p>
                        <p><?php var_dump($results["path_image"])?></p>
                    </div>
                    
                    <div class="col-10 col-content-message content-message2">

                        <div class="row">
                            <p class="message-signature col-4 text-black-50"><?php echo "$results[creation_date]"?></p>
                        </div>

                        <div class="row"> 
                            <p class="message__content">
                            <?php echo "$results[content]"?>
                            </p>
                        </div>

                        <form action=" " method="post">
                        <button id="delete" type="submit" name="message_deleted"  value="<?php echo $results["id"];?>"class="btn btn-outline-warning mb-2 float-right">
                           Annuler
                        </button>
                       </form>
                        
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

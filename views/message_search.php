<?php
    session_start();

    
?>
<?php 
      include "header.php"; 
      
?>

<div class="container-fluid overlay position-relative rounded-lg main__wrap shadow d-flex flex-column pl-1 pb-2">
    
    <nav class="nav__list">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="breadcrumb-item"><a href="topics.php">Topic</a></li>
            <li class="breadcrumb-item"><a href="">Message</a></li>
            <li class="breadcrumb-item active">Search</li>
        </ol>
    </nav>
        
    
   
<?php 

    include "../controlers/functions_message.php";
    $results = message_search();
    if($results)
    {foreach($results as $result)
        {
?>
    <div class="row row-message mb-2 b-radius bg-white shadow-sm pt-2 pr-2">

            <div class="col-2 col-content-message d-flex flex-column justify-content-center">
                <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php 
                if($result["path_image"])
                {"../static/uploads/" .$result["path_image"]."";}
                else 
                { $avatar = "http://2.gravatar.com/avatar/".md5($result['email'])."?s=100&";
                echo "$avatar";}
                ?>  
                alt="avatar_autre">
                <p class="message-position justify-content-center text-black-50"><?php echo "$result[position]";?></p>
                <p class="message-identity  justify-content-center text-black-50"><?php echo "$result[nickname]";?></p>
                <p class="message-number justify-content-center text-black-50"><?php echo "$result[id]";?> post(s)</p>      
            </div>
                        
            <div class="col-10 col-content-message content-message2">
                <div class="row">
                    <p class="message-signature col-4 text-black-50"><?php echo "$result[creation_date]"?></p>
                </div>
                <div class="row">
                    <p class="message-signature col-4 text-black-50"><?php echo "$result[content]"?></p>
                </div>
                <div class="row">
                    <p class="message-signature col-4 text-black-50"><?php echo "$result[signature];"?></p>
                </div>
            </div>              
    </div>
    <!-- END MESSAGE EXEMPLE -->
    <?php }}
    else{echo "Résultat non trouvé";}?>
</div>

 
<?php include "footer.php"; ?>
<?php
    session_start();

    $_SESSION["id"] = 2;
?>
<?php include "header.php"; ?>
        
        <nav aria-label="breadcrumb container-fluid">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
            </ol>
        </nav>
       
<?php include "../controlers/functions_profil.php" ; 
    upload_image();
       
    $result = get_profil();
    if($result != null)
                {
                
                $avatar= "http://2.gravatar.com/avatar/".md5($result['email'])."?s=100&";
            
            //voir si changement photo possible + sexe à choisir pour avatar dont 'Autre'
                    
    ?>
        <div class="row content row-content justify-content-center ">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src=<?php echo $avatar ?> alt="avatar" style="width: 150px;">
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="send_image" >
                </form>
                <div class="card-body">
                    <p class="h1">Profile</p>
                    <form method="post" action="inscription_update.php">
                        <div class="form-group" >
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" id="nickname" value="<?php echo $result['nickname'] ?>" name="nickname">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../static/image/edit.png"></button>
                            </div>
                        </div>
                    
                        <div class="form-group" >
                            <label for="signature">Signature</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="signature" value="<?php echo $result['signature'] ?>" name="signature">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                        <div class="form-group form-group" >
                            <label for="birthday">Birthday</label>
                            <div class="input-with-post-icon datepicker input-group-append">
                                <input id="birthday"  class="form-control-plaintext" type="date" placeholder="" >
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                         </div>  
                        <div class="form-group">
                            <label for="gender">Sexe</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="gender" value="<?php echo $result['gender'] ?>" name="gender">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" class="form-control" id="email" value="<?php echo $result['email'] ?>" name="email">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" id="password" value="<?php echo $result['password'] ?>" name="password">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    <?php 
                 }
                              
        include "footer.php";
        ?>
   
    
        
 

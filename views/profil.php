<?php
    session_start();

?>
<?php include "header.php"; ?>
        
       
<?php include "../controlers/functions_profil.php" ; 
    upload_image();
    //update_profil();
    $result = get_profil();
    if($result != null)
                {
                
                $avatar= "http://2.gravatar.com/avatar/".md5($result['email'])."?s=100&";
            
            //voir si changement photo possible + sexe à choisir pour avatar dont 'Autre'
                    
    ?>
        <div class="row content row-content justify-content-center ">
            <div class="card shadow profil__wrap">
                <div class="card-header profil__image d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src=<?php echo $avatar ?> alt="avatar" style="width: 150px;">
                </div>
                <!-- UPLOAD IMAGE -->
                <form action="" method="post" class="mx-1" name="formImage" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="send_image" >
                </form>
                <!-- UPLOAD IMAGE -->
                <div class="card-body">
                    <p class="h1 d-flex justify-content-center text-black-50">Profil</p>
                    <form method="post" action=" ">
                        <div class="form-group" >
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" id="nickname" value="<?php echo $result['nickname'] ?>" name="nickname">
                                <button type="submit" class="btn btn-update mb-2"><i class="far fa-edit"></i></button>
                            </div>
                        </div>
                    
                        <div class="form-group" >
                            <label for="signature">Signature</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="signature" value="<?php echo $result['signature'] ?>" name="signature">
                                <button type="submit" class="btn btn-update mb-2"><i class="far fa-comment"></i></button>
                            </div>
                        </div>
                        <div class="form-group form-group" >
                            <label for="birthday">Birthday</label>
                            <div class="input-with-post-icon datepicker input-group-append">
                                <input id="birthday"  class="form-control-plaintext border rounded pl-1" type="date" placeholder="" >
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-birthday-cake"></i></button>
                         </div>  
                        <div class="form-group">
                            <label for="gender">Sexe</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="gender" value="<?php echo $result['gender'] ?>" name="gender">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-venus-mars"></i></button>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" class="form-control" id="email" value="<?php echo $result['email'] ?>" name="email">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-envelope"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" id="password" value="<?php echo $result['password'] ?>" name="password">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-lock"></i></button>
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
   
    
        
 

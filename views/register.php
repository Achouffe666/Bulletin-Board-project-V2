<?php 
    session_start();
    
?>
<?php include 'header.php';?>
<body>
<div class="row content row-content justify-content-center ">
            <div class="card shadow profil__wrap">
                <div class="card-header profil__image d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src=<?php echo $avatar ?> alt="avatar" style="width: 150px;">
                </div>
                <!-- UPLOAD IMAGE -->
                <form action="" method="post" class="mx-1" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="send_image" >
                </form>
                <!-- UPLOAD IMAGE -->
                <div class="card-body">
                    <p class="h1 d-flex justify-content-center text-black-50">S'enregistrer</p>
                    <form method="post" action=" ">
                        <div class="form-group" >
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" required placeholder="Choose your username"  name="username" id="username">
                                <button type="submit" class="btn btn-update mb-2"><i class="far fa-edit"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" placeholder="Enter your Email" required class="form-control" id="email_register" value="<?php echo $result['email'] ?>" name="email">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-envelope"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" required placeholder="Choose a Password" id="password_register" value="<?php echo $result['password'] ?>" name="password">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-lock"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Confirmez votre password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" required placeholder="Confirmez votre Password" id="confirm_password_register" value="<?php echo $result['password'] ?>" name="confirm_password">
                                <button type="submit" class="btn btn-update mb-2"><i class="fas fa-lock"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    
    <div class="container">

        <div class="d-flex justify-content-center "> 
            <form method="POST">
            <h2>Register</h2>
                <h3>Username: </h3>
                <input type="text" placeholder="Choose your username" name="username" required id="username" class="form-control">
                <h3>Email: </h3>
                <input type="text" placeholder="Enter your Email" name="email" required id="email"class="form-control">
                <h3>Password: </h3>
                <input type="password" placeholder="Choose a Password" name="password" required id="password"class="form-control">
                <h3>Confirm Password: </h3>
                <input type="password" placeholder="Confirm your password" name="confirmPassword" required id="confirmPassword"class="form-control"><br>
                <input type="submit" name='submit_password' id='submit_password' value='Register' class="btn btn-default">
            </form>
        </div>
        
    </div>

<script src="../register.js"></script>
<?php include "footer.php"; ?> 

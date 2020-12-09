<?php 
    session_start();
    
?>
<?php include 'header.php';?>
<body>
<?php include '../controlers/functions_register.php';
    register();
?>
<div class="row content row-content justify-content-center ">
            <div class="card shadow profil__wrap">
                <div class="card-body">
                    <p class="h1 d-flex justify-content-center text-black-50">S'enregistrer</p>
                    <form method="post" action=" ">
                        <div class="form-group" >
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" required placeholder="Choose your username"  name="username_register" id="username">
                                <i class="far fa-edit"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" placeholder="Enter your Email" required class="form-control" id="email_register" name="email_register">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" required placeholder="Choose a Password" id="password_register" name="password_register">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Confirmez votre password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" required placeholder="Confirmez votre Password" id="confirm_password_register" name="confirm_password">
                                <i class="fas fa-lock"></i></button>
                            </div>
                        </div>
                        <button id="cogoption" type="submit" class="btn btn-link" name="submit_register">
                                Envoyer
                        </button>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
    
    <div class="container">     

<script src="../register.js"></script>
<?php include "footer.php"; ?> 

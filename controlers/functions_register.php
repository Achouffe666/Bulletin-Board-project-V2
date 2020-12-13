<?php

        include '../database/database.php';
        
        function register()
        {
            global $db;
          

            if (isset($_POST["submit_register"]))
            {
                $username = $_POST["username_register"];
                $email = $_POST["email_register"];
                $password = $_POST["password_register"];
                $confirm_password = $_POST["confirm_password"];
                
                if ($password == $confirm_password)
                {
                    $q = $db->prepare("INSERT INTO users(nickname,email,password) VALUES(:username, :email, :password)");
                    $q->execute(array(
                    ':username' => $username,
                    ':email' => $email,
                    ':password' => $password
                    ));
                }
                else
                {
                    echo "Confirmez correctement votre mot de passe";
                    
                }
            }
           

        }
        
        

 ?> 
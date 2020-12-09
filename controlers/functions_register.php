<?php

        include 'database.php';
        global $db;

        if (isset($_POST["submit"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];


            $q = $db->prepare("INSERT INTO users(nickname,email,password) VALUES(:username, :email, :password)");
            $q->execute([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) 
            ]);
        }

 ?> 
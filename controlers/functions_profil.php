<?php
include "../database/database.php";
global $db;
function upload_image()
      { 
          
        global $db;
        if (isset($_POST['send_image'])) 
        {
            $target_dir="../static/uploads/";
            $new_file= str_replace(" ","", $_FILES["fileToUpload"]["name"]);
            $target_file= $target_dir . $new_file;
            
            $uploadOk= 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if (isset($_POST["submit"]))
            {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false)
                {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } 
                else 
                {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                    {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
            
            if ($uploadOk == 0) 
                    {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                    } 
            else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                    {
                    
                
                    $image_uploaded = htmlspecialchars($new_file);
                    $request = $db->prepare("UPDATE users SET path_image =:image WHERE id = :id");
                    $request->execute(array(':image' => $image_uploaded, ':id' => $_SESSION['id'])); 
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";

                    }
                }
         } 
     }

      function get_profil()
      {
          global $db;
          
         $req = $db->prepare('SELECT * FROM users WHERE id = :session');
         $req->execute(array(':session' => $_SESSION["id"] ));
         $result = $req->fetch();
         return $result;
          
      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      function update_profil()
        {
            global $db;
            $nickname = $_POST["nickname"];
            $signature = $_POST["signature"];  
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $password = $_POST["password"];  
            $emailErr = "";
        
            $query = $db->prepare("SELECT * FROM users WHERE id= :id");
            $query->execute(array(':id' => $_SESSION['id']));
            while($datas = $query->fetch())
            {
                if ((isset($_POST['nickname'])) && ($_POST['nickname'] != $datas['nickname']))
                {
                    $sth = $db->prepare("UPDATE users SET nickname = :nickname WHERE id = :id");
                    $sth->execute(array(':nickname' => $nickname, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                if ((isset($_POST['signature'])) && ($_POST['signature'] != $datas['signature']))
                {
                    
                    $sth = $db->prepare("UPDATE users SET signature = :signature WHERE id = :id");
                    $sth->execute(array(':signature' => $signature, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                if ((isset($_POST["gender"])) && ($_POST["gender"] != $datas["gender"]))
                {
                    $sth = $db->prepare("UPDATE users SET gender = :gender WHERE id = :id");
                    $sth->execute(array("gender" => $gender, ":id" => $_SESSION['id']));
                }
                if ((isset($_POST['email'])) && ($_POST['email'] != $datas['email']))
                {
                    if (empty($_POST["email"])) {
                        $emailErr = "Email is required";
                        } else
                        {
                        $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Invalid email format";
                        }
                        else
                        {
                            $sth = $db->prepare("UPDATE users SET email = :email WHERE id = :id");
                            $sth->execute(array(':email' => $email, ':id' => $_SESSION['id']));
                            //TO DO: inscrire succes + validation
                        }
                        }   
                    
                }
                if ((isset($_POST['password'])) && ($_POST['password'] != $datas['password']))
                {
                    
                    $sth = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
                    $sth->execute(array(':password' => $password, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                //TO DO faire un onglet pour gender avec répartition correcte dans les checkbox;
            }
        }
        
    
      ?>
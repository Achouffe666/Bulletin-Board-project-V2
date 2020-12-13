<?php
include "../database/database.php";
global $db;
function upload_image()
      { 
          
        global $db;
        
        if (isset($_POST['send_image'])) 
        {
                if(count($_FILES) > 0)
            {
                
                $new_file= str_replace(" ","", $_FILES["fileToUpload"]["name"]);
                $target_dir = "upload/";
                $imgData = base64_encode(file_get_contents($_FILES['fileToUpload']['tmp_name']));
                $imageFileType = strtolower(pathinfo($new_file,PATHINFO_EXTENSION));
                $imageType = $_FILES["fileToUpload"]["type"];
                $name = $_FILES["fileToUpload"]["name"];
                $image = "data:image/" .$imageFileType. ";base_64," .$imgData;
                $uploadOk= 1;
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
                        } 
                else {
                        $user_id = $_SESSION["id"];
                        $request = $db->prepare("UPDATE users SET image_title =:imgTitle, image_type = :imgType, image_data= :imgData WHERE users.id=$user_id");
                        $request->execute(array
                            (
                            'imgTitle' => $new_file,
                            'imgType' => $imageType,  
                            'imgData' => $imgData
                            )
                        
                        ); 
                        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        
                    }
            } 
        }
     }
    
     function display_image_default()
     {
        global $db;
        include "functions_message.php";
        global $results;
        if ($results["messages.user_id"] == NULL)
        {
            ?>
            <img class="card-img-top img-fluid message-photo d-block mx-auto" src=<?php echo 'data:image/'.$results["image_type"].';base64,'.$results["image_data"];?>  alt="avatar_user">
            <?php
        }
        else
        {
            ?>
            <img class="card-img-top img-fluid message-photo d-block mx-auto" src="../static/image/avatar_autre.jpg" alt="avatar_autre">
            <?php
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
            
            $query = $db->prepare("SELECT * FROM users WHERE id= :id");
            $query->execute(array(':id' => $_SESSION['id']));
            while($datas = $query->fetch())
            {
                if ((isset($_POST['nickname'])) && ($_POST['nickname'] != $datas['nickname']))
                {
                    $nickname = $_POST["nickname"];
                    $sth = $db->prepare("UPDATE users SET nickname = :nickname WHERE id = :id");
                    $sth->execute(array(':nickname' => $nickname, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                if ((isset($_POST['signature'])) && ($_POST['signature'] != $datas['signature']))
                {
                    $signature = $_POST["signature"];  
                    $sth = $db->prepare("UPDATE users SET signature = :signature WHERE id = :id");
                    $sth->execute(array(':signature' => $signature, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                if ((isset($_POST["gender"])) && ($_POST["gender"] != $datas["gender"]))
                {
                    $gender = $_POST["gender"];
                    $sth = $db->prepare("UPDATE users SET gender = :gender WHERE id = :id");
                    $sth->execute(array("gender" => $gender, ":id" => $_SESSION['id']));
                }
                if ((isset($_POST['email'])) && ($_POST['email'] != $datas['email']))
                {
                    $emailErr = "";
                    $email = $_POST["email"];
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
                    $password = $_POST["password"];  
                    $sth = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
                    $sth->execute(array(':password' => $password, ':id' => $_SESSION['id']));
                    //TO DO: inscrire succes + validation
                }
                //TO DO faire un onglet pour gender avec répartition correcte dans les checkbox;
            }
        }
        
    
      ?>
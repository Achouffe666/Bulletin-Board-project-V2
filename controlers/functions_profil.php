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
                    $host="'188.166.24.55' ";
                    $dbname="bcbb-pink-floyd";
                    $user="bcbb-pink-floyd";
                    $pass="ibk@H-7bVsJf.oeT'";
                
                    $image_uploaded = htmlspecialchars($new_file);
                    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
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
         $req->execute(array('session' => $_SESSION["id"] ));
         $result = $req->fetch();
         return $result;
          
      }
    
      ?>
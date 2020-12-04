<?php
    session_start();

    $_SESSION["id"] = 2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style_test.css">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row header">
            <img class="img-fluid image-header" src="../images/rail_duotone.png" alt="image header rail train" style="width: 100%; height: 100%;">
        </div>
        <div class="row breadcrumb">
            <nav aria-label="breadcrumb container-fluid">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="inscription.php">Home</a></li>
                <li class="breadcrumb-item"><a href="inscription_post.php">Boards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
        
    <?php
        $host = "localhost"; 
        $dbname = "forum"; 
        $user = "root"; 
        $pass = "root";
       
        

        try{
            
                $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $req = $db->prepare('SELECT * FROM users WHERE id = :session');
                $req->execute(array('session' => $_SESSION["id"] ));
                while($data = $req->fetch())
                {
                
                $avatar= "http://2.gravatar.com/avatar/".md5($data['email'])."?s=100&";
            
            //voir si changement photo possible + sexe à choisir pour avatar dont 'Autre'
                    
    ?>
        <div class="row content row-content justify-content-center ">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <img class="card-img-top img-fluid card-profil " src=<?php echo $avatar ?> alt="avatar" style="width: 150px;">
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit" >
                </form>
                <div class="card-body">
                    <p class="h1">Profile</p>
                    <form method="post" action="inscription_update.php">
                        <div class="form-group" >
                            <label for="nickname">Pseudo</label>
                                <div class="input-group-append">
                                <input type="text" class="form-control" id="nickname" value="<?php echo $data['nickname'] ?>" name="nickname">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                    
                        <div class="form-group" >
                            <label for="signature">Signature</label>
                            <div class="input-group-append">
                                <input type="text" class="form-control" id="signature" value="<?php echo $data['signature'] ?>" name="signature">
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
                                <input type="text" class="form-control" id="gender" value="<?php echo $data['gender'] ?>" name="gender">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group-append">
                                <input type="email" class="form-control" id="email" value="<?php echo $data['email'] ?>" name="email">
                                <button type="submit" class="btn btn-update mb-2"><img class="img-edit"src="../images/edit.png"></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group-append">
                                <input type="password" class="form-control" id="password" value="<?php echo $data['password'] ?>" name="password">
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
                              
        }
            
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        ?>

    <div class="row-fluid footer">
    </div>
        
 
       
    </body>
</html>
<?php 
session_start();

include "../database/database.php";



    global $db;
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $remember = $_POST['remember'];
    $address = $_POST['address_url'];

    $database2;
    if (isset($_POST['nickname'])) 
    {
        $query = $db->prepare("SELECT nickname, id, password FROM users WHERE nickname = :nickname");
        $query->execute(array(":nickname" => $nickname));
        while($data = $query->fetch())
        {
            
            if (isset($_POST['remember']) && ($_POST['remember'] == true))
            {
                $_SESSION["id"] = $data["id"];
                $_SESSION["nickname"] = $data["nickname"];
                setCookie($data['nickname'], $data["id"], time()+3600, "/", true);
            }
            if($data["password"] == $_POST["password"])
            {
                
                echo "Tu es log log loggué !";
                header("Location:../" . $address);
            }
            else
            {
?>
        <div class="container-fluid">
                <div class="row header">
                    <img class="img-fluid image-header" src="../images/rail_duotone.png" alt="image header rail train" style="width: 100%; height: 100%;">
                </div>
                <div class="row content row-content justify-content-center ">
                    <div class="card">
                        <div class="card-body">
                            <p class="h1">Aie Aie Aie</p>
                            <p>Mauvais mot de passe !</p>
                            <a href="<?php echo $address ;?>">Retour</a>
                        </div>
                    </div>
                </div>
                
<?php
            }
        }
    }


    ?>


   



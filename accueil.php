<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
     <style>
         .my_photo{
             width: 50px;height: 50px;border-radius: 50%;border: 1px solid;
         }
     </style>   
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>

<div id="global">
    <div id="profil">
        <?php 
            session_start();
            echo "Bonjour et Bienvenue ".$_SESSION['monlogin']."<br>";

            $req="select * from utilisateurs where login='".$_SESSION['monlogin']."'";
            $resultat=mysqli_query($cnloccar,$req);
            $ligne=mysqli_fetch_assoc($resultat);
        ?>

        <img src="<?php echo $ligne['my_photo'];?>" class="my_photo">
        <br>
        <a href="deconnecter.php">Deconnexion</a>
    </div> 

    <div id="tableaubord">
         <?php include("tableaubord.php") ?>

    </div>

</div>
    
</body>
</html>
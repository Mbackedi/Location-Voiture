<?php require_once('connexion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>

<div id="container">
    <form action="" method="post" class="formulaire">
        <h1>Connexion</h1>
        <label><b>Nom d'utilisateur :</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="txtlogin" require
        class="zonetext">

        <label><b>Mot de Pass:</b></label>
        <input type="password" placeholder="Entrer le mot de pass" name="txtpw" require
        class="zonetext">

        <input type="submit" name="btlogin" value="LOGIN" id="submit" class="submit">

        <?php 
            if(isset($_POST['btlogin']))
            {
                $req="select * from utilisateurs where login='".$_POST['txtlogin']."' and 
                moPasse='".$_POST['txtpw']."'";
                if($resultat=mysqli_query($cnloccar,$req))
                {
                    $ligne=mysqli_fetch_assoc($resultat);
                    if($ligne!=0){
                        session_start();
                        $_SESSION['monlogin']=$_POST['txtlogin'];
                        header("location:accueil.php");
                    }
                    else{
                        echo "<font color='#F001D'>Login ou Mot de pass incorrect</font>";
                    }
                }
            }
        ?>

    </form>

</div>
    
</body>
</html>
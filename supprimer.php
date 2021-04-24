<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Car</title>
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>

<div id="container">
    <form name="formdelete" class="formulaire">
    <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>
    <?php 
        if(isset($_GET['supcar']))
        {
            $sup=$_GET['supcar'];
            $reqDelete="DELETE FROM automobile WHERE IMM='$sup'";
            $resultat=mysqli_query($cnloccar,$reqDelete);
        }

        if($resultat)
        {
            echo "<label style='text-align:center;color:#960406;'> SUPPRESSION RÉUSSIE...</label>";
        }else
        {
            echo "<label style='text-align:center;color:#960406;'>SUPPRESSION ÉCHOUÉE...</label>";
        }
    ?>
    </form>
</div>
    
</body>
</html>
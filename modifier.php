<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>
<div id="container">
 <form name="formUpdate" method="post" action="" class="formulaire" enctype="multipart/form-data">
    <h2 align="center">Mettre à jour une Voiture...</h2>
        <label><b>Immatriculation</b></label>
        <input type="text" name="txtImm" class="zonetext" value="<?php echo $_GET['modcar']?>" readonly>

        <label><b>Marque</b></label>
        <input type="text" class="zonetext" name="txtMarque" placeholder="Entrer la marque" required>

        <label><b>Prix Location</b></label>
        <input type="number" class="zonetext" name="txtPl" placeholder="Entrer le prix" required>

        <label><b>Photo</b></label>
        <input type="file" class="zonetext" name="txtPhoto" placeholder="Choisir une photo" required>

        <input type="submit" class="submit" name="btmod" value="Mettre a jour">
        <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>

        <label style="text-align:center; color:#360001;">
        <?php 
            if(isset($_POST['btmod']))
            {
                $imm=$_POST['txtImm'];
                $marque=$_POST['txtMarque'];
                $prixloc=$_POST['txtPl'];

                $modifier=$_GET['modcar'];
                $image=$_FILES['txtPhoto']['tmp_name'];

                $trager="images/".$_FILES['txtPhoto']['name'];
                move_uploaded_file($image,$trager);

                $reqUp="UPDATE automobile SET MARQUE='$marque', PRIX_LOC='$prixloc', PHOTO='$trager' WHERE
                IMM='$modifier'";

                $resultat=mysqli_query($cnloccar,$reqUp);

                if($resultat)
                {
                    echo "Modification Réussie";
                }else
                {
                    echo "Modification échouée"; 
                }

            }
        ?>
    
        </label>


 </form>
</div>
    
</body>
</html>
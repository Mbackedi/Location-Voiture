<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Car</title>
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>

    <div id="container">
    <form action="" name="formAdd" method="post" class="formulaire" enctype="multipart/form-data">
        <h2 align="center">Ajouter Nouvelle Voiture</h2>
        <label><b>Immatriculation :</b></label>
        <input type="text" name="txtImm" class="zonetext" placeholder="Entrer Immatricule" required>

        <label><b>Marque :</b></label>
        <input type="text" name="txtMarque" class="zonetext" placeholder="Entrer la marque" required>

        <label><b>Prix Location :</b></label>
        <input type="number" name="txtPl" class="zonetext" placeholder="Entrer le prix location" required>

        <label><b>Photo :</b></label>
        <input type="file" name="txtPhoto" class="zonetext" placeholder="Choisir une image" required>

        <input type="submit" name="btadd" value="Ajouter" class="submit">

        <p><a href="accueil.php" class="submit">Tableau de Bord</a></p>

        <label style="text-align:center;color:#960406;">
            <?php 
                if(isset($_POST['btadd'])){
                    $imm=$_POST['txtImm'];
                    $marque=$_POST['txtMarque'];
                    $prixloc=$_POST['txtPl'];

                    $image=$_FILES['txtPhoto']['tmp_name'];
                    $traget="images/".$_FILES['txtPhoto']['name'];
                    move_uploaded_file($image,$traget);

                    $reqAdd="INSERT INTO automobile(IMM,MARQUE,PRIX_LOC,PHOTO) VALUES
                    ('$imm','$marque','$prixloc','$traget')";

                    $resultat=mysqli_query($cnloccar,$reqAdd);
                    if($resultat)
                    {
                        echo "Insertion des données réussie";
                    }else{
                        echo " Echec d'insertion des données";
                    }

                }
            ?>
        </label>
    </form>
    </div>
    
</body>
</html>
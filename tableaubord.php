<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord....</title>
    <link rel="stylesheet" href="loccar_style.css" />
    <style>
         .photocar{
     width: 130px;
     height: 100px;
     border-radius: 5%;
     border: 1px solid;
 }
    </style>
</head>
<body>

<p><h1><b>Liste des voiture</b></h1>
<?php 
    $reqselect="select * from automobile";
    $resultat=mysqli_query($cnloccar,$reqselect);

    $nbr=mysqli_num_rows($resultat);
    echo "<p> Total <b> ".$nbr."</b> Voitures...</p>";
?>
</p>    
<p><a href="ajouter.php"><img src="images/ajout1.png" width="50px" height="50px"></a></p>

<table width="100%" border="1">
    <tr>
        <th>Immatricule</th>
        <th>Marque</th>
        <th>Prix Location</th>
        <th>Photo</th>
        <th>Supprimer</th>
        <th>Modifier</th>   
    </tr>

    <?php 
        while($ligne=mysqli_fetch_assoc($resultat))
        {
        
    ?>

    <tr>
        <td><?php echo $ligne['IMM'];?></td>
        <td><?php echo $ligne['MARQUE'];?></td>
        <td><?php echo $ligne['PRIX_LOC'];?></td>
        <td><img src='<?php echo $ligne['PHOTO'];?>' class="photocar" ></td>  
        <td><a href="supprimer.php?supcar=<?php echo $ligne['IMM'];?>"><img src="images/sup2.png" width="50px" height="50px"></a></td>
        <td><a href="modifier.php?modcar=<?php echo $ligne['IMM'];?>"><img src="images/mod1.png" width="50px" height="50px"></a></td>
    </tr>

    <?php 
        }
    ?>
</table>

</body>
</html>
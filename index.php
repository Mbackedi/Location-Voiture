<?php require_once('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Car....</title>
    <link rel="stylesheet" href="loccar_style.css" />
</head>
<body>

<div id="entete">

<a href="login.php" class="login">Login</a>

        <video autoplay="autoplay" class="video_entete">
            <source src="images/avatar.mp4" type="video/mp4" />
        </video>
        <p class="nomsite">Location Voiture</p>
        <div id="formauto">
            <form name="formauto" method="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder=" Recherche par marque..." />
                <input class="btfind" type="submit" name="btsubmit" value="Recherche" />
            </form>
        </div>
</div>
<div id="articles">
    <?php 
    if(isset($_POST['btsubmit'])){
        $mc=$_POST['motcle'];
        $reqSelect="select * from automobile where MARQUE like '%$mc%'";
    }
    else{
        $reqSelect="select * from automobile";
    }
    $resultat=mysqli_query($cnloccar,$reqSelect);
    $nbr=mysqli_num_rows($resultat);
    echo "<p><b>".$nbr." </b> Réseltat de votre recherche...</p>";
    while($ligne=mysqli_fetch_assoc($resultat))
    { 
    ?>
    <div id="auto">
         <img src="<?php echo $ligne['PHOTO'] ?>" /></br />
         <?php echo $ligne['IMM'];?><br />
         <?php echo $ligne['MARQUE'];?><br />
         <?php echo $ligne['PRIX_LOC'];?>
    </div>
    
    <?php } ?>
</div>
    
</body>
</html>
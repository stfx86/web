<?php
session_start();
if(!isset($_SESSION["login"])){

    header("Location: auth.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <span><a href="logout.php"  >deconixion</a></span>
    <h1>Bienenu  <span style="color: red;"> <?=$_SESSION['login']?> </span>  chez nexus E-Co!! </h1>
    <?php 
    if(!isset($_SESSION["panier"])){
echo "Votre panier est vide !?";

    }  ?>
    <div>
        <br>
        <a href="ajout_article.php">cliquer ici </a> pour le remplire 

    </div>
    




</body>
</html>
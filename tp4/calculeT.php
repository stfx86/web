<?php
 
	session_start();
	$panier=$_SESSION['panier'];
	$total=0;
	$total+=$panier['SAMSANG_GALAXY_S9']*7090;
	$total+=$panier['HUAWEI_P30']*7990;
	$total+=$panier['Apple_iPhone_8']*6890;
?>

<html>
	<head>
		<title>my  smartphones</title>
	</head>

	<body bgcolor="#FFFFFF">
		<p align="center">Le total de votre panier est : <b><?php echo $total; ?> DH</b></p>
		<p align="center"><a href="ajout_article.php" style="color: #166FE5 ;">Modifier mon panier</a></p>
		<p align="center"><a href="initialisation.php" style="color: #166FE5 ;">Vider mon panier</a></p>
		<p align="center"><a href="" style="color: #166FE5 ;">Confirmer la commande</a></p>
		<br><br>
		<p><a href="logout.php" style="color: black;">deconnexion</a></p>
	</body>
</html>
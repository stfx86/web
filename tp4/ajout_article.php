<?php 
	session_start();
    if(!isset($_SESSION['panier']))
        header("Location: initialisation.php");



	$panier=$_SESSION['panier'];
	if (isset($_GET['add']))
	{
		switch ($_GET['add']) 
		{
			case 'SAMSANG_GALAXY_S9':
				$panier['SAMSANG_GALAXY_S9']++;
			break;
			case 'HUAWEI_P30':
				$panier['HUAWEI_P30']++;
			break;
			case 'Appele_iPhone_8':
				$panier['Apple_iPhone_8']++;
			break;
		}
		

		$_SESSION['panier']=array(
									"SAMSANG_GALAXY_S9" => $panier["SAMSANG_GALAXY_S9"], 
									"HUAWEI_P30" => $panier['HUAWEI_P30'],
									"Apple_iPhone_8" => $panier['Apple_iPhone_8'] 
								 );

	}
?>

<html>
	<head>
		<title>Mon magasin de smartphones</title>
		<meta charset="utf-8">
	</head>

	<body bgcolor="#FFFFFF">
		<h3 align="center" style="margin-top: 100px; font-size: x-large; "> L'ajout des smartphones</h3><br>
		<table border="1"  cellpadding="10px" style="border-collapse: collapse;" align="center">
			<tr align="center">
				<th>Ajouter</th>
				<th>Votre commande en quantité</th>
			</tr>
			<tr align="center">
				<td><a href="ajout_article.php?add=SAMSANG_GALAXY_S9" style="color: #166FE5 ;">Smartphone SAMSANG_GALAXY_S9 NOIR</a>(7090 DH)</td>
				<td><font size="3" style="color: #166FE5 ;"><?php echo "<pre> ".$panier['SAMSANG_GALAXY_S9'];?></font> SAMSANG_GALAXY_S9</td>
			</tr>
			<tr align="center">
				<td><a href="ajout_article.php?add=HUAWEI_P30" style="color: #166FE5 ;">Smartphone HUAWEI_P30 </a>(7990 DH)</td>
				<td><font size="3" style="color: #166FE5 ;"><?php echo "<pre> ".$panier['HUAWEI_P30'];?></font> HUAWEI_P30</td>
			</tr>
			<tr align="center">
				<td><a href="ajout_article.php?add=Appele_iPhone_8" style="color: #166FE5 ;">Smartphone Apple_iPhone_8 </a>(6890 DH)</td>
				<td><font size="3"  style="color: #166FE5 ;"> <?php echo "<pre> ".$panier['Apple_iPhone_8'];?></font> Apple_iPhone_8</td>
			</tr>
		</table>
		<p align="center"><a href="initialisation.php" style="color: black ;">Vider mon panier</a></p>
		<p align="center"><a href="calculeT.php" style="color: black ;">Calculer le total</a></p>
		<p align="center"><a href="accueil.php" style="color: black ;">Retour à la page d'accueil</a></p>
		<br><br><p><a href="logout.php" style="color: black;">deconnexion </a></p>
	</body>
</html>
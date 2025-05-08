<?php 
	session_start();
	$_SESSION['panier']=array('SAMSANG_GALAXY_S9' => '0', 'HUAWEI_P30' => '0','Apple_iPhone_8' => '0' );
	header("Location: ajout_article.php");
?>
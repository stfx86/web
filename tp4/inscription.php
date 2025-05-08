<?php
// Enable error reporting at the top of your script
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "connexion.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$secret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
	$response = $_POST['g-recaptcha-response'];

	$verify = file_get_contents(
		"https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}"
	);

	$captcha_success = json_decode($verify);

	if (!$captcha_success->success) {
		echo "faild to verify captcha";
		// header("Location: inscription.php?error=captcha_faild");
		// exit(222);
	}

	extract($_POST);
	print_r($_POST);
	if(
		mysqli_num_rows(
			mysqli_query($bd,
			"select login from bd_tp_php.users where login='{$login}'; "))!=0
	){
		header("Location: inscription.php?error=user_already_exist");
		exit(22);
	}

	if (isset($login) && !empty($login)) {
		if ($password === $conf_password) {
			if ($email === $conf_email) {
				$query = "insert into bd_tp_php.users(login ,password,email) values
				(
			'{$login}'
				,
			'{$password}'
				,
			'{$email}'
				);
				";
			
			$resp=mysqli_query($bd,$query);
			header("Location: accueil.php");
			

			
			}




		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
	<h1>Connectez vous et profitez de nos meilleur produits</h1>
	<div align="center">
		<fieldset style="display: inline-block;">
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
				<table>
					<tr>
						<td><label><b>Login : </b></label></td>
						<td><input type="text" name="login" size="30" /></td>
					</tr>
					<tr>
						<td><label><b>Password : </b></label></td>
						<td><input type="password" name="password" size="30" /></td>
					</tr>

					<tr>
						<td><label><b>confirme pswd : </b></label></td>
						<td><input type="password" name="conf_password" size="30" /></td>
					</tr>
					<tr>
						<td><label><b>email: </b></label></td>
						<td><input type="email" name="email" size="30" /></td>
					</tr>
					<tr>
						<td><label><b>confirme email: </b></label></td>
						<td><input type="email" name="conf_email" size="30" /></td>
					</tr>
					<!-- <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div> -->

					<tr>
					<tr>

						<!-- </tr>
				<td><label><b>Merci de retaper le code de l'imag ci-dessus </b></label></td>
				<td><input type="text" name="login" size="30"/></td>
		    </tr> -->



					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="submit" value="s'inscrire" />
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</div>
	<?php

	if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error'])) {

		echo "<script>alert('" . $_GET['error'] . "')</script>";
	}

	?>
</body>

</html>
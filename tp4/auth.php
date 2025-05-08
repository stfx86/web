<?php

require "connexion.php";

if (isset($_POST["submit"])) {


    extract($_POST);
    if (
        mysqli_num_rows(
            mysqli_query($bd, "
        select login from bd_tp_php.users where login='{$login}' and password='{$password}';

                       ")
                       )==1
        
        ) {
            session_start();
            $_SESSION["login"]=$login;
            
            header("Location: accueil.php");

       
    }
    else {
        header("Location: auth.php?error=no user with the these credentiels");
    }
}




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error'])) {

    echo "<script>alert('" . $_GET['error'] . "')</script>";
}

?>
    <div align="center" >
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
                    <tr >
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Se connecter" />
                        </td>
                    </tr>
                </table>
                <p align="center"><a  href="inscription.php">Creer un nouveau compte</a></p>
            </form>
        </fieldset>
    </div>
   
</body>

</html>
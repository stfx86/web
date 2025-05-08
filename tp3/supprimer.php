<?php
require "connexion.php";

if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['mat']) && !empty($_GET['mat'])) {
        $query="delete from  bd_tp_php.etudiants WHERE mat = {$_GET['mat']} ";
        if (mysqli_query($bd,$query)) {
            header("location: liste_etudiants.php");
        }else{

            echo "problem with deletions";
        }
        
    }
    
}

?>
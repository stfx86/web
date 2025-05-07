<?php


session_start();


if(!isset($_SESSION['cpt'])){
    $_SESSION["cpt"]=1;
    $_SESSION["login"]="mon login";




}else{


    $_SESSION["cpt"]++;
    echo "bonjour ".$_SESSION["login"]."!<br>\n";
    echo "vous aver vu cette page ".$_SESSION["cpt"]."fois\n";
    echo "le SID courant est : ".$_SESSION["cpt"]."fois ";
    
}

?>
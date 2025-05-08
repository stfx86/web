<?php


if(isset($_COOKIE["compture"])){
$valeur = $_COOKIE["compture"]+1;
$msg="vous etea deja venu ".$_COOKIE["compture"]."fois<br/>\n";


}else{


  $msg="je vous met un petit cokier <br/>\n";
  $valeur=1;
}

setcookie("compture",$valeur);
echo $msg;

?>
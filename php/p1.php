<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Document</title>
</head>
<body>

<?php

$nomficher=fopen('c.txt','r+');


$pages_vue=fgets($nomficher);

$pages_vue+=1;
fseek($nomficher, 0);
fputs($nomficher,$pages_vue);
fclose($nomficher);
echo '<p> LE NOMBRE DE VISITEUR EST : '.$pages_vue.'visiteur!</p>';



?>
    
</body>
</html>
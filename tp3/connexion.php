<?php


$host = "localhost";
$username = "stof";
$password = "bennasser";
$database = "bd_tp_php";
$nombre_etudiants=0;

// Connect using separate port parameter
$bd = mysqli_connect($host, $username, $password, $database) or die("connection faild");
// echo "Connected successfully!";


?>
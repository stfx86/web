<?php

require "connexion.php";


// $res = mysqli_query($bd, "select  * from bd_tp_php.etudiants");
// $row = mysqli_fetch_assoc($res);

function lister()
{
    global $bd;

    $res = mysqli_query($bd, "select  * from bd_tp_php.etudiants");
    global $nombre_etudiants;
    $nombre_etudiants=mysqli_num_rows($res);
    while ($row = mysqli_fetch_assoc($res)) {
        echo " 
            <tr>
            <td>" . $row["mat"] . "</td>
            <td>" . $row["nom"] . "</td>
            <td>" . $row["prenom"] . "</td>
            <td>" . $row["naissance"] . "</td>
            <td>" . $row["sex"] . "</td>
            <td>" . $row["adresse"] . "</td>
            <td>  <a href=\"modifier.php?mat={$row["mat"]}\">Modifier</a> / <a href=\"supprimer.php?mat={$row["mat"]}\">Supprimer        </a>         </td>
            </tr>";
    }
};







?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Liste Etudiants</h1>
    <fieldset>
        <table border="2px">
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date De Naissance</th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>

            <?php
            lister();
            ?>

        </table>
    </fieldset>
    <br><br>
    <a href="ajout_form.php">Ajoute un etudiant </a>
    <span>(le nombre d etudiants incrits est <?= $nombre_etudiants?>)</span>
</body>

</html>
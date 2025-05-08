<?php
// Enable error reporting at the top of your script

error_reporting(E_ALL);
ini_set('display_errors', 1);


require "connexion.php";

// globals
$formaData = [
    "naissance" => '',
    "nom" => '',
    "prenom" => '',
    "mat" => '',
    "sex" => '',
    "adresse" => ''
];
$error = '';




//GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $mat = isset($_GET['mat']) ? (int)$_GET['mat'] : 0;
    $query = "select * from bd_tp_php.etudiants where mat={$mat}";
    $resp = mysqli_query($bd, $query);
    if (mysqli_num_rows($resp) == 0) {
        $error = "no one with the matricule $mat";
        header("location: modifier.php?error=$error");
        exit(11);
    }


    $row = mysqli_fetch_assoc($resp);
    // echo "from get___________________";
    // print_r($row)."<br><br>";
    // echo "___________________";
    foreach ($row as $k => $v) {
        global $formaData;
        $formaData["$k"] = $row["$k"];
    }
    // echo "from get_22__________________";
    // print_r($formaData)."<br><br>";
    // echo "___22________________";


}





//POSt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // echo $_POST['submit'];
    global $formaData, $error;




    foreach ($formaData as $k => $v) {

        if (isset($_POST[$k]) && !empty($_POST[$k])) {
            $formaData[$k] = htmlspecialchars($_POST[$k]);
        } else {
            $error = "you must specify $k";
            header("location: modifier.php?error=$error");
            break;
        }
    }
    $formaData['mat'] = (int)$formaData['mat'];
    //
    // echo "testing formaData ";
    // foreach ($formaData as $k => $v) {
    //   echo "$k" . "====>" . "$v" . "<br><br>";
    // }
    //




    //checkig if matricul not  existing 

    $mat = $formaData['mat'];

    // $error = "Matricule must be a number not \"$mat\" ";
    // header("location: ajout_form.php?error=$error");


    $query = "select mat   from bd_tp_php.etudiants where mat=$mat";
    $delete_query  = "delete  from  bd_tp_php.etudiants where mat=$mat";
    $insert_query = "insert into  bd_tp_php.etudiants (mat, nom, prenom, naissance, sex, adresse)
    VALUES ( 
     $mat ,
    '{$formaData['nom']}' ,
    '{$formaData['prenom']}' ,
    '{$formaData['naissance']}' ,
    '{$formaData['sex']}' ,
    '{$formaData['adresse']}'
      )";




    $resp = mysqli_query($bd, $query);
    if (mysqli_num_rows($resp) != 1) {
        $error = "matriccl do not  exist ";
        header("location: modifier.php?error=$error");
    } else {
        mysqli_query($bd, $delete_query);
        mysqli_query($bd, $insert_query);
        header("location: liste_etudiants.php");
    }
}








?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        label {
            display: inline-block;
            width: 150px;
            vertical-align: top;
        }

        div {

            margin: 6px;
        }

        .loisir {
            display: inline-flex;

        }

        fieldset {
            display: inline-table;

        }
    </style>
</head>

<body>
    <?php
    print_r($formaData);


    ?>
    <h1>Modifier Etudiants</h1>
    <fieldset>
        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">


            <div> <label> Matricule </label>
                <input type="text" name="mat" value="<?= $formaData["mat"] ?>">
            </div>


            <div> <label> nom</label>
                <input type="text" name="nom" required value="<?= $formaData["nom"] ?>">
            </div>
            <div>
                <label>prenom </label>
                <input type="text" name="prenom" value="<?= $formaData["prenom"] ?>" required>
            </div>


            <div>
                <label>Date de Naissance </label>
                <input type="date" name="naissance" value="<?= $formaData["naissance"] ?>" />
            </div>

            <div>

                <label>Sexe</label>
                <select name="sex">

                    <option value="feminin" <?php if ($formaData["sex"] == 'feminin')


                                                echo "selected";  ?>>Femme</option>
                    <option value="masculin" <?php if ($formaData["sex"] == 'masculin')


                                                    echo "selected";  ?>>Homme</option>
                </select>
            </div>

            <div>
                <label>Adresse</label>
                <input type="text" name="adresse" value="<?= $formaData["adresse"] ?>" required>
            </div>

            <div>
                <button type="submit" name="submit" value="modifier">Modifier</button>
                <button type="reset"> effacer</button>

            </div>

        </form>
    </fieldset>

</body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error'])) {

    echo "<script>alert('" . $_GET['error'] . "')</script>";
}

?>

</html>
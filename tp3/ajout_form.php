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
  "mat" => 0,
  "sex" => '',
  "adresse" => ''
];
$error = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  global $formaData, $error;




  foreach ($formaData as $k => $v) {

    if (isset($_POST[$k]) && !empty($_POST[$k])) {
      $formaData[$k] = htmlspecialchars($_POST[$k]);
    } else {
      $error = "you must specify $k";
      header("location: ajout_form.php?error=$error");
      break;
    }
    
  }
  $formaData['mat']=(int)$formaData['mat'];

  //
  // echo "testing formaData ";
  // foreach ($formaData as $k => $v) {
  //   echo "$k" . "====>" . "$v" . "<br><br>";
  // }
  //


  //connect to the dataabse 
  // $bd = mysqli_connect('localhost', 'stof', 'bennasser', 'bd_tp_php') or die("connection faild");

  //checkig if matricul already exist 

  $mat = $formaData['mat'];
  if(!is_int($mat)){
    $error = "Matricule must be a number not \"$mat\" ";
    header("location: ajout_form.php?error=$error");
    exit(1);

  }
  $query = "select mat , nom , prenom  from bd_tp_php.etudiants where mat=$mat";




  $resp = mysqli_query($bd, $query);
  if (mysqli_num_rows($resp) != 0) {
    $error = "matriccl already exist choose a diffrent one";
    header("location: ajout_form.php?error=$error");
  } else {

    $query = "insert into  bd_tp_php.etudiants (mat, nom, prenom, naissance, sex, adresse)
     VALUES ( 
      {$formaData['mat']} ,
     '{$formaData['nom']}' ,
     '{$formaData['prenom']}' ,
     '{$formaData['naissance']}' ,
     '{$formaData['sex']}' ,
     '{$formaData['adresse']}'
       )";
    echo $query . "<br><br>";
    if (mysqli_query($bd, $query)) {

      header("location: liste_etudiants.php");
    }
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
  <h1>Nouveau Etudiants </h1>
  <fieldset>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">


      <div> <label> Matricule </label>
        <input type="text" name="mat" required>
      </div>


      <div> <label> nom</label>
        <input type="text" name="nom" required>
      </div>
      <div>
        <label>prenom </label>
        <input type="text" name="prenom" required>
      </div>


      <div>
        <label>Date de Naissance </label>
        <input type="date" name="naissance" />
      </div>

      <div>

        <label>Sexe</label>
        <select name="sex">

          <option value="feminin">Femme</option>
          <option value="masculin">Homme</option>
        </select>
      </div>

      <div>
        <label>Adresse</label>
        <input type="text" name="adresse" required>
      </div>

      <div>
        <button type="submit">Enregistre</button>
        <button type="reset"> effacer</button>

      </div>

    </form>
  </fieldset>

</body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  if (isset($_GET['error'])) {

    echo "<script>alert('" . $_GET['error'] . "')</script>";
  }
}

?>

</html>
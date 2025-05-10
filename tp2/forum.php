<?php
// Enable error reporting at the top of your script
error_reporting(E_ALL);
ini_set('display_errors', 1);


// print_r($_POST);




class Msg {
  public $nom;
  public $prenom;
  public $email;
  public $ville;
  public $pays;
  public $message;
  public $file;
  public $time;

  public function __construct($nom, $prenom, $email, $ville, $pays, $message, $file="",$time
  ) {
      $this->nom = $nom;
      $this->prenom = $prenom;
      $this->email = $email;
      $this->ville = $ville;
      $this->pays = $pays;
      $this->message = $message;
      $this->file = $file;
      $this->time=$time;
  }
}


$msgs_array=[];
 // echo file_get_contents("msgs");


if ($_SERVER["REQUEST_METHOD"]==="POST") {
 echo "post";

  extract($_POST);
  $file = "";
  $msg = new Msg($nom,$prenom,$email,$ville,$pays, $message,"",date("d/m/y H:i:s")
);
  // global $msgs_array;
  // global $msgs;
  if(filesize("msgs")!=0){
    if(!$msgs_array=unserialize(file_get_contents("msgs")))
    die("faild to unserialize ");


  }
  $msgs_array[]=$msg;

  if(!$serialized_msgs_array=serialize($msgs_array))
     die("faild to serialize ");
    echo "serialized_msgs_array:::" ;
    print_r($serialized_msgs_array);
  file_put_contents("msgs",$serialized_msgs_array);
    header("Location: forum.php");


  
}





?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire et Messages</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post"  action="forum.php" >

    <div>
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">
    </div>
    <div>
      <label for="prenom">Prenom</label>
      <input type="text" id="prenom" name="prenom">
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email">
    </div>
    <div>
      <label for="ville">Ville</label>
      <input type="text" id="ville" name="ville">
    </div>
    <div>
      <label for="pays">Pays</label>
      <input type="text" id="pays" name="pays">
    </div>
    <div>
      <label for="message">Message</label>
      <textarea  name="message" rows="4"></textarea>
    </div>
    <!-- <div>
      <label >Joindre un fichier</label>
      <input type="file"  name="file">
    </div> -->
    <div>
      <button type="submit" name="submit" value="Envoyer">Envoyer</button>
    </div>  
  </form>


  <?php
  if (isset($_POST['submit'])) 
    echo "post";
  // echo "contend:::";
  // file_get_contents("msgs");
  if(!$msgs_array=unserialize(file_get_contents("msgs")))
  die("faild to unserialize 2");

 
foreach($msgs_array as $k){


echo "
 <div class=\"message-box\">
    <div class=\"message-header\">
      <div><strong>Nom & Prénom:</strong> {$k->nom}  {$k->prenom} </div>
      <div><strong>ville:</strong> {$k->ville} / {$k->pays}</div>
    </div>
    <div><strong>Msg:</strong> ({$k->time})</div>
    <p>{$k->message}</p>
  </div> <br>";
  // print_r($k->nom."<br><br>");



}
 ?>
  <!-- Example messages -->
  <!-- <div class="message-box">
    <div class="message-header">
      <div><strong>Nom & Prénom:</strong> amine tester</div>
      <div><strong>ville:</strong> el jadida / maroc</div>
    </div>
    <div><strong>Msg:</strong> (24/04/19 10:37)</div>
    <p>ceci est un test</p>
  </div> -->

</body>
<?php

?>
</html>
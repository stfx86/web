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
<fieldset>
<form method="post" action="affiche_parametres.php" enctype="multipart/form-data">
    
<div>  <label > votre nom</label> 
<input type="text" name="nom"  required ></div>
<div>
<label>votre mote de pass </label>
<input type="password" name="password" id="" required  ></div>

<div>
<label > votre profession </label>
<select name="profession[]" multiple >
<option>architecture</option>
<option>Agent immobilier</option>
</select>
</div>
<div>
<label >Votre paye</label>
<select  name="pays" > 

<option>maroc</option>
<option>autre</option>
</select>

</div>




<div>
<LAbel>votre sex </LAbel>
<input type="radio" name="sexe" value="F"/> F 
<input type="radio" name="sexe" value="M"/> M 
    
</div>

<div>

<label  >Votr Langue </label>
<select name="langue" >

<option>Francais</option>
<option> Arabe</option>
<option>Anglais</option>
</select>
</div>
<div>

<label>
Votre loisir 
</label>
<fieldset class="loisir">
<input type="checkbox" name="loisir[]" value="sport" > Sport
<input type="checkbox" name="loisir[]" value="music" >Music
<input type="checkbox" name="loisir[]" value="internet" > Internet 
<input type="checkbox" name="loisir[]" value="voyager" > Voyager 
<input type="checkbox" name="loisir[]" value="lecture" >Lecture 
<input type="checkbox" name="loisir[]" value="recherche" >Recherche
</fieldset>

</div>
<div>
<label>Votr CV (en pdf) </label>
<input  type="file"  name="cv" accept=".pdf" />
</div>
<div>
    <button type="reset"> vider</button>
    <button> Valider</button>
    <button type=""> Retablir</button>
</div>


</form>
</fieldset>

</body>
</html>







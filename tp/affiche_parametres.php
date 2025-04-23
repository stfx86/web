
 <?php
//  echo $_FILES['cv']['name'];

//  die("wtfff");




 $up_dir="uploads";

if ($_FILES["cv"]) {
    

if($_FILES['cv']['size']<4*1000*1000){

if (substr($_FILES['cv']['name'],-4)===".pdf") {
    
 if(   move_uploaded_file($_FILES['cv']['tmp_name'],$up_dir."/_".date('y_m_d__h_m_s').".pdf") ){

 
    echo "you files was uploaded succefully ";  }else{
echo "faild to upload the file ";

    }




}else{


    print_r("only pdf are excepted !!!!");
}

}else{

    echo"plese dont exeed the approprt size";
}
    
}





// echo $_FILES['cv']['size'];



// foreach($_POST as $k=>$v){

//     echo $k.":".$v."<br>";  
// }
// echo "------"."<br>";
// echo "<a href=\"./form.php\">home</a>";
// foreach($_POST['profession'] as $v){

//     echo ":".$v."<br>";
// }
// echo "<br>";
// foreach($_POST['loisir'] as $v){

//     echo ":".$v."<br>";
// }









?>

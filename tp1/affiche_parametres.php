<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>

    <table>
      <?php
      affiche();
      ?>

    </table>

</body>

</html>


<?php



//  echo $_FILES['cv']['name'];




$up_dir = "uploads";

if ($_FILES["cv"]  && !$_FILES["cv"]["error"]) {


    if ($_FILES['cv']['size'] < 4 * 1000 * 1000) {

        if (substr($_FILES['cv']['name'], -4) === ".pdf") {

            if (move_uploaded_file($_FILES['cv']['tmp_name'], $up_dir . "/uploadedCV_" . date('y_m_d__h_m_s') . ".pdf")) {


                echo "<strong>file:</strong>".$_FILES['cv']['name']."<br><br>";
                echo "<strong>with size :</strong>".$_FILES['cv']['size']."BYTE<br><br>";
                echo "<strong>was uploaded succefully</strong><br><br>";


            } else {
                echo "faild to upload the file <br><br> ";
            }
        } else {


            print_r("only pdf are excepted !!!!");
        }
    } else {

        echo "plese dont exeed the appropriet size";
    }
} else {

    echo "<script>alert(\"errors with uploading the file \")</script>";
}



function affiche()
{


    foreach ($_POST as $k => $v) {
        echo "

        <tr>
           <td style=\"border: 1px solid black;\" >" . $k . "</td>
           <td style=\"border: 1px solid black;\" >" . $v . "</td>
        </tr>
         ";

    }
    echo "------" . "<br>";
   
}



foreach ($_POST['profession'] as $v) {

    echo ":" . $v . "<br>";
}
echo "<a href=\"./form.php\">home</a>";

echo "<br>";








?>
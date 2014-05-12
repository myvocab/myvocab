<?php
//include("connect_db.php");
//$a = $_POST["FILE"];
//echo $_FILES["FILE"]["tmp_name"] ;
  $file = @$_FILES["FILE"]["tmp_name"];
$file_name = $_FILES["FILE"]["name"];

//echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];
if ($_FILES['FILE']['type']=="text/plain")
{
@move_uploaded_file($file, "misc/$file_name");

echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];
}
else
{

            $_SESSION['mess2'] ='<font style="font-size:13px" color="#FF0000" face="Arial">
               Неправильный формат файла.</font><br>';
              header("Location:..\mytexts.php");
             
}

?>
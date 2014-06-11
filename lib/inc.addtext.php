<?php
//include("connect_db.php");
//$a = $_POST["FILE"];
//echo $_FILES["FILE"]["tmp_name"] ;
if ($_FILES['FILE']['type']!="text/plain")
{
$_SESSION['mess2'] ='<font style="font-size:13px" color="#FF0000" face="Arial">
               Неправильный формат файла.</font><br>';
              header("Location:..\mytexts.php");    
    
}

  $file = @$_FILES["FILE"]["tmp_name"];
  


$fp = fopen($file, "r") or die("Can't open file!");
 $content = fread($fp, filesize($file));
for ($i = 0; $i <= filesize($file); $i++) {

    
    $wrd = $wrd.$content[$i];
 
 echo ord ($content[$i])." " ;
}
    // Вывод содержимого файла
    print $content.filesize($file)."ffffffffffffffffffff";
fclose($fp); 

$file_name = $_FILES["FILE"]["name"];
//echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];


@move_uploaded_file($file, "$file_name");
 

//$fl = fread($_FILES["FILE"], filesize($_FILES["FILE"]));
//echo filesize($_FILES["FILE"]); 
echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];


 
    







            
             



?>
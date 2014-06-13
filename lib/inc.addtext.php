<?php
//include("connect_db.php");
//$a = $_POST["FILE"];
//echo $_FILES["FILE"]["tmp_name"] ;
$strSQL = "DROP TABLE word500";
$result = mysqli_query($link, $strSQL);
$strSQL = "CREATE TABLE IF NOT EXISTS word500 (
id int(11) NOT NULL AUTO_INCREMENT,
wordO varchar(255) DEFAULT NULL,
NS int(11) DEFAULT NULL,ocal
NP int(11) DEFAULT NULL,
UNIQUE KEY id (id)
) ENGINE = MYISAM DEFAULT CHARSET = utf8";
$result = mysqli_query($link, $strSQL);

$strSQL = "DROP TABLE s500";
$result = mysqli_query($link, $strSQL);

$strSQL = "CREATE TABLE IF NOT EXISTS s500 (
  id int(11) NOT NULL AUTO_INCREMENT,
  sentence longtext,
  UNIQUE KEY id (id)
) ENGINE=MYISAM DEFAULT CHARSET=utf8";
$result = mysqli_query($link, $strSQL);


$strSQL = "DROP TABLE t500";
$result = mysqli_query($link, $strSQL);

$strSQL = "CREATE TABLE IF NOT EXISTS t500 (
  id int(11) NOT NULL AUTO_INCREMENT,
  txt longtext,
  UNIQUE KEY id (id)
) ENGINE=MYISAM DEFAULT CHARSET=utf8";
$result = mysqli_query($link, $strSQL);


$wrd="";
$snt="";
$ns = 1;
$pg="";
$np = 1;
$countChLinePr=0;
$countChLineNext=0;
$maxChLine=70;
//$CurChLine= 0;
$lnOut = "";
$CurLine= 0;

if ($_FILES['FILE']['type']!="text/plain")
{
$_SESSION['mess2'] ='<font style="font-size:13px" color="#FF0000" face="Arial">
               Неправильный формат файла.</font><br>';
              header("Location:..\mytexts.php");    
    
}

$file = @$_FILES["FILE"]["tmp_name"];
$fp = fopen($file, "r") or die("Can't open file!");
$content = fread($fp, filesize($file));

//echo ord($content[0])." ".ord('"');exit();
$content = str_replace(chr(148),chr(34),$content);
$content = str_replace(chr(147),chr(34),$content);
$content = str_replace(chr(151),chr(45),$content);

$contentOut="http://myvocab.org - Build your vocabulary of the English".chr(13).chr(10).chr(13).chr(10);
$contentOut=$contentOut."------- page ".$np."-------".chr(13).chr(10);
$np=$np+1;


for ($i = 0; $i <= filesize($file); $i++) {
  if ( ord ($content[$i]) ==9){$lnOut = "    ".$lnOut; $CurChLine = $CurChLine+4; continue;}
  if ( ord ($content[$i]) ==13){$lnOut = " ".$lnOut; $CurChLine = $CurChLine+1;$snt = " ".$snt;continue;}
  if (ord($content[$i])==10){
      $snt = " ".$snt; 
      $contentOut=$contentOut. rtrim($lnOut).chr(13).chr(10);
      $pg=$pg. rtrim($lnOut)."</BR>".chr(13).chr(10);
      $CurLine=$CurLine+1;
      if ($CurLine==20){$contentOut=$contentOut."------- page ".$np."-------".chr(13).chr(10);$CurLine=0;$np=$np+1;
      $strSQL = "INSERT INTO t500 (txt) VALUES ('".$pg."')";
        $result = mysqli_query($link, $strSQL);
      $pg="";
      }
      $lnOut=""; 
      continue;
  }
  

  $CurChLine = $CurChLine+1; 
  $snt = $snt.$content[$i];
  $lnOut=$lnOut.$content[$i];
  
  if(preg_match('#^[a-zа-яё]+$#ui', $content[$i]))
        {
       $wrd = $wrd.$content[$i]; 
        }         
    else
     {
     if(strlen($lnOut)>=70)
     {
      $contentOut=$contentOut. rtrim($lnOut).chr(13).chr(10); 
      $CurLine=$CurLine+1;
      if ($CurLine==20){
          $pg=$pg. rtrim($lnOut)."</BR>".chr(13).chr(10);
          $contentOut=$contentOut."------- page ".$np."-------".chr(13).chr(10);$CurLine=0;$np=$np+1;
         $strSQL = "INSERT INTO t500 (txt) VALUES ('".$pg."')";
        $result = mysqli_query($link, $strSQL);
      $pg="";
      }
      
       $lnOut=""; 
     }
  
      if(preg_match('#^[!?.]+$#ui', $content[$i]))
      { 
        if(preg_match('#^["\']+$#ui', $content[$i+1])){$snt = $snt.$content[$i+1];$i=$i+1;}
        $snt=str_replace('"','\"',$snt); 
        $snt=str_replace("'","\'",$snt);
        echo $ns.")".$snt."</BR>";
        
        $strSQL = "INSERT INTO s500 (sentence) VALUES ('".$snt."')";
        $result = mysqli_query($link, $strSQL);
        $ns = $ns+1;
        $snt ="";
      }
       if($wrd!="")
           {
          
               
       //    echo $wrd."</BR>"; 
           $wrd ="";
           }
 
 
      }   
 
 
 
 
 //echo ord ($content[$i])." " ;
}
    // Вывод содержимого файла


//    print $content.filesize($file)."ffffffffffffffffffff";
fclose($fp); 
$contentOut=$contentOut.chr(13).chr(10)."http://myvocab.org - Build your vocabulary of the English";
$fp = fopen("777.txt", "w");
fwrite($fp,$contentOut);
fclose($fp);

$file_name = $_FILES["FILE"]["name"];
//echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];


//////////////////////////@move_uploaded_file($file, "$file_name");
 

//$fl = fread($_FILES["FILE"], filesize($_FILES["FILE"]));
//echo filesize($_FILES["FILE"]); 
echo $file." ddd ".$file_name."type - ".$_FILES['FILE']['type'];


 
    







            
             



?>
<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}
include("connect_db.php");

date_default_timezone_set('UTC');
$userId=$_SESSION['userId'];

$nSt=$_GET["nSt"];
$nFn=$_GET["nFn"];
$dateS=$_GET["dateS"];  
$dateE=$_GET["dateE"]; 
$flr=Trim($_GET["flr"]);
$NW = 20;
$strWHERE = " WHERE ((";


$strSQL = "DROP TABLE mvv". $userId;
$result = mysqli_query($link, $strSQL);

$strSQL = "CREATE TABLE IF NOT EXISTS mvv". $userId ." (
  id int(11) NOT NULL AUTO_INCREMENT,
  wordE varchar(255) DEFAULT NULL,
  wordO varchar(255) DEFAULT NULL,
  wordTr varchar( 255 ) DEFAULT '',
  transc varchar(50) DEFAULT NULL,
  transl longtext,
  pr int(2) DEFAULT '0',
  flag int(11) DEFAULT '0',
  date50 datetime DEFAULT NULL,
  UNIQUE KEY id (id),
  UNIQUE KEY wordE (wordE)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
$result = mysqli_query($link, $strSQL);



if ($_GET["d0"]=="true") {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=0) or ";}
if ($_GET["d50"]=="true") {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=50) or ";}
if ($_GET["d100"]=="true") {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=100) or ";}
if ($_GET['flagdel']=="true") {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=-1) or ";} 

if ($flr == "true") {$strWHERE = $strWHERE." 1=0) and (mvdone".$userId.".flag=0))";
$strSQL1 =   'SELECT  wordE, wordO, wordTr, pr, date50, transl, transc FROM mvdone'. $userId . 
$strWHERE.' ORDER BY id LIMIT '.($nSt-1).','.($nFn - $nSt+1).'';
}
else
{$strWHERE = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".date50>='".$dateS."') and (mvdone".$userId.".date50<='".$dateE."'))";
$strSQL1 =   'SELECT  wordE, wordO, wordTr, pr, date50, transl, transc FROM mvdone'. $userId . 
$strWHERE.' ORDER BY id';
}



$strSQL="INSERT INTO mvv". $userId ."  (wordE, wordO, wordTr, pr, date50, transl, transc) ".$strSQL1;
$result = mysqli_query($link, $strSQL);

$strSQL="UPDATE mvv". $userId ." SET mvv". $userId .".flag = mvv". $userId .".id";
$result = mysqli_query($link, $strSQL);

$result = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue=0 WHERE (FieldName="mvv")');




//echo $nSt ."@@@".$nFn  ."@@@".$_GET['d0']."@@@".$_GET['d50']."@@@".$_GET['d100']."#####".$strWHERE;
echo $strSQL1;
?>


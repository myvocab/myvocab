<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:../index.php");
              exit();
}

$userId=$_SESSION['userId'];
include("connect_db.php");
date_default_timezone_set('UTC');

$HHH =0;
$secInDay=86400;
//$beac=1;
$wordCurr=htmlspecialchars($_GET["wordCurr"]);
//$wordCurr=$_GET["wordCurr"];
$ch=$_GET["ch"];
//$HL=$_GET["HL"];
$HL=1;

$strSQL =   'SELECT UNIX_TIMESTAMP(TimeClickTmp) as tct, NS, m FROM mvdone'. $userId .' WHERE wordE="'.$wordCurr.'"';
 $res = mysqli_query($link, $strSQL);  
 $row = mysqli_fetch_array($res); 
 $NS = $row[NS]; $TimeClickTmp = $row[tct]; $m = $row[m];

// $nh = mktime($date50tmp);
$nh = mktime()-($TimeClickTmp + $mySqlTZ);

if ($nh<$secInDay*0.5 and $NS==1 ){$HL=0;}
if ($nh<$secInDay*0.5 and $NS==2 ){$HL=0;}
if ($nh<$secInDay*2.5 and $NS==3){$HL=0;}
if ($nh<$secInDay*6.5 and $NS==4){$HL=0;}
if ($nh<$secInDay*13.5 and $NS==5){$HL=0;}
if ($nh<$secInDay*30.5 and $NS==6){$HL=0;}
if ($nh<$secInDay*30.5 and $NS==7){$HL=0;}

if ($m <> $ch){$HL =1;}






if($HL==1)
{
    if ($ch==1)
    {
    $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", TimeClickTmp="'.date("Y-m-d H:i:s").'",  iterationO=iterationO+1, NS=NS+1   WHERE (wordE="'.$wordCurr.'")';
    }
    else
    {
    $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", TimeClickTmp="'.date("Y-m-d H:i:s").'", iterationE=iterationE+1, NS=0  WHERE (wordE="'.$wordCurr.'")';   
    }
}
else
{
    if ($ch==1)
    {
$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", iterationO=iterationO+1   WHERE (wordE="'.$wordCurr.'")';
//$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.'  WHERE (wordE="'.$wordCurr.'")';
    }
    else
    {
    $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", TimeClickTmp="'.date("Y-m-d H:i:s").'", iterationE=iterationE+1, NS=0  WHERE (wordE="'.$wordCurr.'")';   
 //      $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', NS=0  WHERE (wordE="'.$wordCurr.'")'; 
    }
   
}


//$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'",  
//iterationE=iterationE+1, NS=NS+1  WHERE (wordE="abstemious")';


$result = mysqli_query($link, $strSQL);


//$strSQL = 'SELECT COUNT(*) FROM '. $wl .' WHERE  (flag<>-1)';
//$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $beac=$row[0];



echo $nh." ===== ".$secInDay*2.5." ===== ".$HL." ===== ". $strSQL ;
?>


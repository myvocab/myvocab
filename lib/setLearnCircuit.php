<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:../index.php");
              exit();
}

$userId=$_SESSION['userId'];
include("connect_db.php");
date_default_timezone_set('UTC');


$secInDay=86400;
$beac=1;
$wordCurr=htmlspecialchars($_GET["wordCurr"]);
//$wordCurr=$_GET["wordCurr"];
$ch=$_GET["ch"];
$HL=$_GET["HL"];



if($HL==1)
{
    if ($ch==1)
    {
    $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", 
    iterationO=iterationO+1, NS=NS+1   WHERE (wordE="'.$wordCurr.'")';
    }
    else
    {
    $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", 
    iterationE=iterationE+1, NS=0  WHERE (wordE="'.$wordCurr.'")';   
    }
}
else
{
    if ($ch==1)
    {
//$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'"   WHERE (wordE="'.$wordCurr.'")';
$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.'  WHERE (wordE="'.$wordCurr.'")';
    }
    else
    {
 //   $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'", NS=0  WHERE (wordE="'.$wordCurr.'")';   
       $strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', NS=0  WHERE (wordE="'.$wordCurr.'")'; 
    }
   
}


//$strSQL = 'UPDATE mvdone'. $userId .' SET m='.$ch.', TimeClick="'.date("Y-m-d H:i:s").'",  
//iterationE=iterationE+1, NS=NS+1  WHERE (wordE="abstemious")';


$result = mysqli_query($link, $strSQL);


//$strSQL = 'SELECT COUNT(*) FROM '. $wl .' WHERE  (flag<>-1)';
//$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $beac=$row[0];



echo " ch= ".$ch."  HL = ".$HL."  ".$strSQL;
?>


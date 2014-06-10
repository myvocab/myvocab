<?php
session_start();
$userId=$_SESSION['userId'];
include("connect_db.php");
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
  header('Cache-Control: no-store, no-cache, must-revalidate'); 
  header('Cache-Control: post-check=0, pre-check=0', FALSE); 
  header('Pragma: no-cache'); 

$CBook = 1; 
$idStart = 1;     
$limitSt = 0;
$NW = 20;
$StW = 10;
$strWHERE = " WHERE (flag>0)";
$idCurr=1;
$NimInTable=1;

// ????????????? ????????? ???? ? ?????? ????? ?????? 
    $pp = 1;   //end prev indication
    $np = 1;   //end next indication
    $mvTrnsl = $pp.$np; //end prev or start  
    $mvTrnsc = -1;  //    
    $mvidSort = -1; 
    $mvW = -1;
    $mvDate = -1; //Date study words
    $mvPr = "1111"; //flag learn or del
    $mvFlag = -1; 
 // End ????????????? ????????? ???? ? ?????? ????? ?????? 
  $WO=Trim($_GET["WO"]);
//seek id for wordOcurr 
if ($_GET["chval"] =="s"){$wl = "mvs". $userId; $wln = "mvs";}
if ($_GET["chval"] =="r"){$wl = "mvr". $userId; $wln = "mvr";}
if ($_GET["chval"] =="v"){$wl = "mvv". $userId; $wln = "mvr";}
if ($WO != "")
{
$strSQL =   'SELECT flag FROM '. $wl .' WHERE wordO="'.$WO.'" ORDER BY flag';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$idCurr = $row[flag];
}
//seek id for wordOcurr 
 
 
 
 




$strSQL =   'SELECT id, wordE, wordO, transl, pr, flag, date50, transc, wordTr FROM '. $wl .
' WHERE ((flag>'.$idCurr.') and (flag<>-1)) ORDER BY flag LIMIT 0,'.$StW;



$res = mysqli_query($link, $strSQL); 

while ($row = mysqli_fetch_array($res))
{ 

    $mvTrnsl =$mvTrnsl."{{~".$row['transl'];
    $mvTrnsc =$mvTrnsc."{{~".$row['transc'];
    $mvidSort = $mvidSort."{{~".$row['id'];
    $mvW = $mvW."{{~".$row['wordE'];
    $mvDate = $mvDate."{{~".substr($row['date50'],0,4).".".substr($row['date50'],5,2).".".substr($row['date50'],8,2); 
    $mvPr = $mvPr."{{~".$row['pr'];
    $mvOW = $mvOW."{{~".$row['wordO'];
    $mvWtr = $mvWtr."{{~".$row['wordTr'];
}   

//$idStart =31;

/*if ($_GET["ch"]=="PrevPage" or $_GET["ch"]=="NextPage" or $_GET["ch"]=="LastPage" or $_GET["ch"]=="FirstPage" or $_GET["ch"]=="bookmark")
{                            
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$idStart.' WHERE (FieldName="learnIdStartPage")');
}
*/            
echo $mvidSort."@(@".$mvW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mvDate."@(@".$mvPr."@(@".$mvOW."@(@".$mvWtr;
//echo $strSQL;
?>


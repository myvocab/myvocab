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
$NSt = 20;
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
 
//seek id for wordOcurr 
if ($_GET["chval"] =="s"){$wl = "mvs". $userId; $wln = "mvs";}
if ($_GET["chval"] =="r"){$wl = "mvr". $userId; $wln = "mvr";}
if ($_GET["chval"] =="v"){$wl = "mvv". $userId; $wln = "mvv";}
if ($_GET["wocurr"] != "")
{
$strSQL =   'SELECT flag FROM '. $wl .' WHERE wordE="'.$_GET["wocurr"].'" ORDER BY flag';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$idCurr = $row[id];
}
//seek id for wordOcurr 
 
 
 
 
// ????????? ?????? ?? ??????? InfoTmp
$res = mysqli_query($link, 'SELECT infotmp'. $userId .'.* FROM infotmp'. $userId );
while ($row = mysqli_fetch_array($res)){$InfoTmp[$row['FieldName']] = $row['FieldValue'];}
if ($_GET["chval"] =="s"){$idStart = $InfoTmp["mvs"];}
if ($_GET["chval"] =="r"){$idStart = $InfoTmp["mvr"];}
if ($_GET["chval"] =="v"){$idStart = $InfoTmp["mvv"];}

// End ????????? ?????? ?? ??????? InfoTmp

//Calc number row
$strSQL = 'SELECT COUNT(*) FROM '. $wl .' WHERE (flag>0) ORDER BY flag';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0]; 
$strSQL = 'SELECT COUNT(*) FROM '. $wl .' WHERE ((flag<'.$idStart.') and (flag<>-1)) ORDER BY flag';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRDown = $row[0]+1;
$CurrRow = $NRDown;
//End Calc number row



if ($_GET["ch"]=="FirstPage"){$pp=0; $idStart=0; $CurrRow = 1;}

if ($_GET["ch"]=="LastPage"){
$strSQL =   'SELECT flag FROM '. $wl .
' WHERE (flag>0) ORDER BY flag LIMIT '.($NRAll - $NW).',1';    
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $idStart=$row[0]; 
$np=0; $CurrRow = $NRAll-$NW+1; 
}



if (($_GET["ch"]=="NextPage") and (($NRAll-$NRDown)>$NW)){
$strSQL =   'SELECT flag FROM '. $wl .
' WHERE (flag>='.$idStart.') ORDER BY flag LIMIT '.$NW.',1';    
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $idStart=$row[0];       
$CurrRow = $NRDown + $NW; 
if (($NRAll-$NRDown)<= (2*$NW)){$np=0;}
}
if (($_GET["ch"]=="NextPage") and (($NRAll-$NRDown)<= $NW)){$np=0; $CurrRow = $NRDown;}

if (($_GET["ch"]=="PrevPage") and ($NRDown>($NW))){
$st = $NRDown - $NW-1;
$strSQL =   'SELECT flag FROM '. $wl .
' ORDER BY flag LIMIT '.$st.',1';    
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $idStart=$row[0];   
$CurrRow = $NRDown - $NW;     
}
if (($_GET["ch"]=="PrevPage") and ($NRDown<=($NW+1))){$pp=0; $idStart=0; $CurrRow = 1;}

if (($_GET["ch"]=="start") and (($NRAll-$NRDown)<= $NW)){$np=0;}
if (($_GET["ch"]=="start") and ($NRDown<=($NW))){$pp=0;}






$strSQL =   'SELECT id, wordE, wordO, transl, pr, flag, date50, transc, wordTr FROM '. $wl .
' WHERE (flag>='.$idStart.') ORDER BY flag LIMIT 0,'.($NW+$NSt);
//$strWHERE.' ORDER BY id LIMIT 0,'.($NW+$NSt).'';




/*
$mvidSort = $NRAll;
$mvW = $NRAll-$NRUp + 1;
$mvTrnsc = $NW;
$mvOW=$oWordCurr;
*/

$mvidSort = $NRAll;
$mvW = $CurrRow;
$mvTrnsc = $NRDown;
$mvOW="ddd";

$mvTrnsl = $pp.$np;



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
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$idStart.' WHERE (FieldName="'.$wln.'")');
mysqli_close($link);
echo $mvidSort."@(@".$mvW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mvDate."@(@".$mvPr."@(@".$mvOW."@(@".$mvWtr;

?>


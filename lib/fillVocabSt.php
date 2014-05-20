<?php
session_start();
$userId=$_SESSION['userId'];
include("connect_db.php");
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
  header('Cache-Control: no-store, no-cache, must-revalidate'); 
  header('Cache-Control: post-check=0, pre-check=0', FALSE); 
  header('Pragma: no-cache'); 
$NW = 20;
$StW = 10;
$CBook = 1; 
$idStart = 1;     
$limitSt = 0;


$strWHERE = " WHERE ((";
$idCurr=1;
$NimInTable=1;
$oWordCurr="";
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
    $prsword = -2;
 // End ????????????? ????????? ???? ? ?????? ????? ?????? 
 

 
 
 


 if ($_GET["WO"] != ""){
 $strSQL =   'SELECT id , pr FROM mvdone'. $userId .' WHERE wordE="'.$_GET["WO"].'" ORDER BY id LIMIT 1';
 $res = mysqli_query($link, $strSQL);
 $row = mysqli_fetch_array($res); 
 $idCurr = $row[id]; $prsword = $row[pr]; 
 }   



//seek id for wordOcurr 
 
 
 
 
// ????????? ?????? ?? ??????? InfoTmp
$res = mysqli_query($link, 'SELECT infotmp'. $userId .'.* FROM infotmp'. $userId );
while ($row = mysqli_fetch_array($res))
{
    $InfoTmp[$row['FieldName']] = $row['FieldValue'];
}
// End ????????? ?????? ?? ??????? InfoTmp
 $CBook = 0;
// $idStart = $InfoTmp['s'.$CBook];

$idStart = $InfoTmp['idStartPage'.$CBook];


if ($InfoTmp['vdone0']==1) {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=0) or ";}
if ($InfoTmp['vdone50']==1) {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=50) or ";}
if ($InfoTmp['vdone100']==1) {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=100) or ";}
if ($InfoTmp['vflagdel']==1) {$strWHERE = $strWHERE."((mvdone".$userId.".pr)=-1) or ";} 
 $strWHEREAll = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".id>=0) )";
// $strWHERETmp = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=".$idStart.") )";

$strWHERECur1 = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".id>".$idCurr.") )";
$strWHERECur2 = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".id=".$idCurr.") )";
$strWHERECur3 = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".id<".$idCurr.") )";



 
 
 $mvPr =  "1111";
 
 
 
 
 
 

 
 $strWHERE = $strWHERE." 1=0) and (mvdone".$userId.".flag=0) and (mvdone".$userId.".id>=".$idStart.") )";
 //??????? ????. ??????? ??? ????????????? idStart
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId ." ".$strWHERE.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$NRUp = $row[0]; 
 
// end ??????? ????. ???????  ??? ????????????? idStart








/*if ($_GET["ch"]=="PrevPage")
{$limitSt=($NRAll-$NRUp-$NW); 
 if($limitSt<=0){$limitSt=0;}
} */
$mvTrnsl = "11";
//}

 
$strSQL =   'SELECT id, wordO, wordE, transl, idSort, pr, flag, date50, transc, iterationE, NP, iterationO, NS, wordTr FROM mvdone'. $userId . 
$strWHERECur1.' ORDER BY id LIMIT 0,'.$StW.'';


$mvidSort = "";
$mvW = "";
$mvTrnsc = "";
$mvOW="";


$res = mysqli_query($link, $strSQL);

 
     


while ($row = mysqli_fetch_array($res))
{ 

    $mvTrnsl =$mvTrnsl."{{~".$row['transl'];
    $mvTrnsc =$mvTrnsc."{{~".$row['transc'];
	$mvidSort = $mvidSort."{{~".$row['idSort'];
    $mvNP = $mvNP."{{~".$row['NP'];
	$mvW = $mvW."{{~".$row['wordE'];
    $mvDate = $mvDate."{{~".substr($row['date50'],0,4).".".substr($row['date50'],5,2).".".substr($row['date50'],8,2); 
	$mvPr = $mvPr."{{~".$row['pr'];
    $mvOW = $mvOW."{{~".$row['wordE'];
    $mvIterationE = $mvIterationE."{{~".$row['iterationE'];
    $mvIterationO = $mvIterationO."{{~".$row['iterationO'];
    $mvNS = $mvNS."{{~".$row['NS'];
    $mvWtr = $mvWtr."{{~".$row['wordTr'];
}


   
echo $mvidSort."@(@".$mvW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mvDate."@(@".$mvPr."@(@".$mvOW."@(@".$mvNP."@(@".$mvIterationE."@(@".$mvIterationO."@(@".$mvNS."@(@".$mvWtr;
 
?>


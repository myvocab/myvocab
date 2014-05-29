<?php
session_start();

if ($_SESSION['userName'] == NULL) {
            $_SESSION['mess'] = $_SESSION['mess'] = '  ';
//              header("Location:index.php");
              echo("stop");
              exit();
}



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
 
//Trim
 

 
 //seek id for wordOcurr 
 
if ($_GET["ch"]!="findword")  {
 if ($_GET["wocurr"] != "")
 {
 $strSQL =   'SELECT id, flag, wordE, pr FROM mv'. $userId .' WHERE wordO="'.$_GET["wocurr"].'" ORDER BY id';
 $res = mysqli_query($link, $strSQL);
 $row = mysqli_fetch_array($res); 
 
 $idCurr = $row[id];
 }
}


$wocurrF = Trim($_GET["wocurr"]);


$wocurrF = Trim($_GET["wocurr"]);
if ($_GET["ch"]=="findword")
{
 if ($wocurrF != ""){
 
 $strSQL =   'SELECT id , pr, wordE, flag FROM mv'. $userId .' WHERE wordO="'.$wocurrF.'" ORDER BY id LIMIT 1';
 $res = mysqli_query($link, $strSQL);
    
 if (mysqli_num_rows($res) > 0 ) {  
 $row = mysqli_fetch_array($res); 
     if($row[flag]==1){
     $wocurrF = $row[wordE];    
     $strSQL =   'SELECT id , pr FROM mv'. $userId .' WHERE wordE="'.$wocurrF.'" ORDER BY id LIMIT 1';
     $res = mysqli_query($link, $strSQL);  
     $row = mysqli_fetch_array($res); 
     $idCurr = $row[id]; $prsword = $row[pr];
     }
     else
     {
      $idCurr = $row[id]; $prsword = $row[pr];   
     }
 }
 else
 {
 $strSQL =   'SELECT id , pr FROM mv'. $userId .' WHERE wordE="'.$wocurrF.'" ORDER BY id LIMIT 1';
 $res = mysqli_query($link, $strSQL);  
 $row = mysqli_fetch_array($res); 
 $idCurr = $row[id]; $prsword = $row[pr];
 }
 
 
  
 

 
 
 
 }   
}


//seek id for wordOcurr 
 
 
 
 
// ????????? ?????? ?? ??????? InfoTmp
$res = mysqli_query($link, 'SELECT infotmp'. $userId .'.* FROM infotmp'. $userId );
while ($row = mysqli_fetch_array($res))
{
    $InfoTmp[$row['FieldName']] = $row['FieldValue'];
}
// End ????????? ?????? ?? ??????? InfoTmp
 $CBook = $InfoTmp['CBook'];
// $idStart = $InfoTmp['s'.$CBook];

$idStart = $InfoTmp['idStartPage'.$CBook];

$mvDate = $InfoTmp['learnDate'];
//$flagLearn = $InfoTmp['flagLearn'];
 
 //$mvDate = strtotime("10 September 2000");
//$mvDate =   $test + 1;
 
// $time = strtotime("-1 day");
//$fecha = date("Y-m-d", $time);

//Get and Set  idStart   
    if ($_GET["ch"]=="bookmark")  {$idStart = $InfoTmp['b'.$CBook] ; $idCurr= $idStart;}
//End Get and Set idStart
 //  if ($_GET["ch"]=="findword")  {$idStart = $InfoTmp['b'.$CBook] ; $idCurr= $idStart;}

 
 // $result = mysqli_query($link, 'UPDATE mvdone'. $userId .' SET flag=1 WHERE (date50="'.$mvDate.'")');
 
 
 
 if ($_GET["ch"]=="d0"){
     if ($_GET["chval"]=="true") {$InfoTmp['done0'] = 1;}     
     else {$InfoTmp['done0'] = 0;}   
         
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$InfoTmp["done0"].' WHERE (FieldName="done0")');
}

 
 if ($_GET["ch"]=="d50"){
     if ($_GET["chval"]=="true")
        {$InfoTmp['done50'] = 1;}  
     else
        {$InfoTmp['done50'] = 0;}   
 $res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$InfoTmp["done50"].' WHERE (FieldName="done50")');
}

 if ($_GET["ch"]=="d100"){
      
     if ($_GET["chval"]=="true")
        {$InfoTmp['done100'] = 1;}  
     else
        {$InfoTmp['done100'] = 0;}   
 
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$InfoTmp["done100"].' WHERE (FieldName="done100")');
}


 if ($_GET["ch"]=="fdel"){
      
     if ($_GET["chval"]=="true")
        {$InfoTmp['flagdel'] = 1;}  
     else
        {$InfoTmp['flagdel'] = 0;}   

$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$InfoTmp["flagdel"].' WHERE (FieldName="flagdel")');
}

if ($prsword==0)   {$InfoTmp['done0']=1;
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue= 1 WHERE (FieldName="done0")');}
if ($prsword==50)   {$InfoTmp['done50']=1;
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue= 1 WHERE (FieldName="done50")');}
if ($prsword==100)   {$InfoTmp['done100']=1;
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue= 1 WHERE (FieldName="done100")');}
if ($prsword==-1)   {$InfoTmp['flagdel']=1;
$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue= 1 WHERE (FieldName="flagdel")');}




if ($InfoTmp['done0']==1) {$strWHERE = $strWHERE."((mv".$userId.".pr)=0) or ";}
if ($InfoTmp['done50']==1) {$strWHERE = $strWHERE."((mv".$userId.".pr)=50) or ";}
if ($InfoTmp['done100']==1) {$strWHERE = $strWHERE."((mv".$userId.".pr)=100) or ";}
if ($InfoTmp['flagdel']==1) {$strWHERE = $strWHERE."((mv".$userId.".pr)=-1) or ";} 
 $strWHEREAll = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=0) )";
// $strWHERETmp = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=".$idStart.") )";

$strWHERECur1 = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=".$idCurr.") )";
$strWHERECur2 = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id=".$idCurr.") )";
$strWHERECur3 = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id<".$idCurr.") )";
 //Seek oWord for showWord
if ($_GET["ch"]!='NextPage' and $_GET["ch"]!='PrevPage' and $_GET["ch"]!='LastPage' and $_GET["ch"]!='FirstPage' and $_GET["ch"]!='start') {
//if ($_GET["ch"]=='fdel' or $_GET["ch"]=='d0' or $_GET["ch"]=='d50' or $_GET["ch"]=='d100') {
 
$strSQL =   'SELECT wordO FROM mv'. $userId ." ".$strWHERECur1.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$oWordCurr = $row['wordO'];

$strSQL =   'SELECT wordO FROM mv'. $userId ." ".$strWHERECur2.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 

// if $oWordCurr ??????????? ??????
//if ($oWordCurr == $row['wordO'])
{
$strSQL =   'SELECT count(*) FROM mv'. $userId ." ".$strWHERECur3.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$NimInTable=$_GET["nit"]; 
 // if ($row[0]>$NW/2) {
  if ($row[0]>$NimInTable+1) {
      $lm =$row[0]-$NimInTable+1;
      $strSQL =   'SELECT id FROM mv'. $userId .' '.$strWHEREAll.' ORDER BY id LIMIT '.$lm .',1 ';
     $res = mysqli_query($link, $strSQL);
     $row = mysqli_fetch_array($res);  
     $idStart=  $row[0] ;  
      }
    else{
     $idStart=0;   
    }

    
}
}


// ?end if $oWordCurr ??????????? ??????

//End Seek oWord for showWord
$strWHERETmp = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=".$idStart.") )";


$strSQL =   'SELECT COUNT(*) FROM mv'. $userId ." ".$strWHEREAll.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$NRAll = $row[0];
 
 
 
 $mvPr =  $InfoTmp['done0'].$InfoTmp['done50'].$InfoTmp['done100'].$InfoTmp['flagdel'].$InfoTmp['flagLearn'];
 
 
 
 
 
 
 if    ($_GET["ch"]=="NextPage" or  $_GET["ch"]=="PrevPage" or  $_GET["ch"]=="FirstPage" or  $_GET["ch"]=="LastPage")
 {
//Calc new idStart if  NextPage or PrevPage 
//??????? ????. ???????
$strSQL = 'SELECT COUNT(*) FROM mv'. $userId ." ".$strWHERETmp.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$NRUp = $row[0]; 
 

// end ??????? ????. ???????

if ($_GET["ch"]=="NextPage" and $NRUp<=$NW){$limitSt=$NRAll-$NRUp;} 
if ($_GET["ch"]=="NextPage" and $NRUp>$NW){$limitSt=$NRAll-$NRUp + $NW;}  
if ($_GET["ch"]=="PrevPage" and $NRAll-$NRUp<=$NW) {$limitSt=0;}
if ($_GET["ch"]=="PrevPage" and $NRAll-$NRUp>$NW) {$limitSt=$NRAll-$NRUp-$NW;}
if ($_GET["ch"]=="LastPage" and $NRUp<=$NW){$limitSt=$NRAll-$NRUp;} 
if ($_GET["ch"]=="LastPage" and $NRUp>$NW){$limitSt = $NRAll - $NW;}  


$strSQL =   'SELECT id, wordE, transl, idSort, pr, flag, date50, transc, m FROM mv'. $userId . 
$strWHEREAll.' ORDER BY id LIMIT '.$limitSt.',1';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$idStart = $row[0]; 
 }
 //End Calc new idStart if  NextPage or PrevPage
 
 $strWHERE = $strWHERE." 1=0) and (mv".$userId.".flag=0) and (mv".$userId.".id>=".$idStart.") )";
 //??????? ????. ??????? ??? ????????????? idStart
$strSQL = 'SELECT COUNT(*) FROM mv'. $userId ." ".$strWHERE.' ORDER BY id';
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
$NRUp = $row[0]; 
 
// end ??????? ????. ???????  ??? ????????????? idStart
if ($NRAll==$NRUp){$pp=0; }
if ($NRUp<=$NW){$np=0; }








/*if ($_GET["ch"]=="PrevPage")
{$limitSt=($NRAll-$NRUp-$NW); 
 if($limitSt<=0){$limitSt=0;}
} */
$mvTrnsl = $pp.$np;
//}

 
$strSQL =   'SELECT id, wordO, wordE, transl, idSort, pr, flag, date50, transc, iterationE, NP, wordTr FROM mv'. $userId . 
$strWHERE.' ORDER BY id LIMIT 0,'.($NW+$NSt).'';


$mvidSort = $NRAll;
$mvW = $NRAll-$NRUp + 1;
$mvTrnsc = $NW;
$mvOW=$oWordCurr;


$res = mysqli_query($link, $strSQL);

 
     


while ($row = mysqli_fetch_array($res))
{ 

//    $mvTrnsl =$mvTrnsl."{{~".htmlspecialchars($row['transl'], ENT_QUOTES, 'utf-8');
        $mvTrnsl =$mvTrnsl."{{~".$row['transl'];
 //   $mvTrnsc =$mvTrnsc."{{~".htmlspecialchars($row['transc'], ENT_QUOTES, 'utf-8');
    $mvTrnsc =$mvTrnsc."{{~".$row['transc'];
    
    $mvidSort = $mvidSort."{{~".$row['idSort'];
    $mvNP = $mvNP."{{~".$row['NP'];
    $mvW = $mvW."{{~".$row['wordE'];
    $mvDate = $mvDate."{{~".substr($row['date50'],0,4).".".substr($row['date50'],5,2).".".substr($row['date50'],8,2); 
    $mvPr = $mvPr."{{~".$row['pr'];
    $mvOW = $mvOW."{{~".$row['wordO'];
    $mvIterationE = $mvIterationE."{{~".$row['iterationE'];
    $mvWtr = $mvWtr."{{~".$row['wordTr'];
}



$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$idStart.' WHERE (FieldName="idStartPage'.$CBook.'")');
mysqli_close($link);

echo $mvidSort."@(@".$mvW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mvDate."@(@".$mvPr."@(@".$mvOW."@(@".$mvNP."@(@".$mvIterationE."@(@".$mvWtr;
 
?>


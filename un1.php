<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}
include("lib/connect_db.php");

$secInDay=86400;
date_default_timezone_set('UTC');
$userId=$_SESSION['userId'];

//$dLearn=$_GET["dLearn"]; 
//$dlStampSt = mktime(0, 0, 0, substr($dLearn,5,2), substr($dLearn,8,2), substr($dLearn,0,4));

$timenow=mktime();
//$timenow=mktime(21, 0, 0, 5, 16, 2013);

echo $userId."</br>";



//сегодня отмеченные m=0


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (m=1 and pr=50 and NS=0 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
echo $NRAll." &nbsp;&nbsp; m=1 and pr=50 and NS=0 MUST BE NULL - 0"."</br>";


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (m=0 and pr=50 and NS=0 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
echo $NRAll." &nbsp;&nbsp; m=0 and pr=50 and NS=0"."</br>";

$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (m=-1 and pr=50 and NS=0 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
echo $NRAll." &nbsp;&nbsp;m=-1 pr=50 and NS=0"."</br>";



$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (m=-1 and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
echo $NRAll."&nbsp;&nbsp;&nbsp;  m=-1 and pr=50"."</br>";


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=1  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(0.5*$secInDay).') and NS=1  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=1  0.5*secInDay</br>";



$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=2  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(0.5*$secInDay).') and NS=2  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=2  0.5*secInDay</br>";







$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=3  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(2.5*$secInDay).') and NS=3  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=3  2.5*secInDay</br>";



$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=4  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(6.5*$secInDay).') and NS=4  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=4  6.5*secInDay</br>";





$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=5  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(13.5*$secInDay).') and NS=5  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=5  13.5*secInDay</br>";





$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=6  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(30.5*$secInDay).') and NS=6  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=6  30.5*secInDay</br>";



$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (NS=7  and pr=50 and NS<100)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (('.$timenow.'-(UNIX_TIMESTAMP(TimeClickTmp)+'.$mySqlTZ.')>'.(30.5*$secInDay).') and NS=7  and pr=50)';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRPart = $row[0];
echo $NRAll." - ".$NRPart."&nbsp;&nbsp;&nbsp; NS=7  30.5*secInDay</br>";

/*===================================================






$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
 
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClick)+".$mySqlTZ.")>".(13.5*$secInDay).") and NS=5  and pr=50 and idLearn<>1) ORDER BY idSort DESC LIMIT ".(22-$NRAll+1);
$result = mysqli_query($link, $strSQL);

$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClick)+".$mySqlTZ.")>".(30.5*$secInDay).") and NS=6  and pr=50 and idLearn<>1) ORDER BY idSort DESC LIMIT ".(23-$NRAll+1);
$result = mysqli_query($link, $strSQL);




$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<20)
{
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClick)+".$mySqlTZ.")>".(30.5*$secInDay).") and NS=7 and pr=50 and idLearn<>1) ORDER BY idSort DESC LIMIT ".(24-$NRAll+1);
$result = mysqli_query($link, $strSQL);
}





//if not full
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<25)
{
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClick)+".$mySqlTZ.")>".(5*60).") and m=-1  and pr=50 and idLearn<>1) ORDER BY idLearn  DESC LIMIT ".(25-$NRAll);
$result = mysqli_query($link, $strSQL);    
}

 

//if not full
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<25)
{
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE (pr=50 and idLearn<>1) ORDER BY TimeClick LIMIT ".(25-$NRAll);
$result = mysqli_query($link, $strSQL);
}


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0]; 





for ($i = 1; $i <= $NRAll; $i++) {
$strSQL ='UPDATE mvdone'. $userId .' SET idLearn='.rand(1000, 2000).' WHERE idLearn=1 ORDER BY idSort  LIMIT 1';
$result = mysqli_query($link, $strSQL);
}

$strSQL = 'SELECT wordE, transl, transc, iterationE, iterationO, NS, date50, m, TimeClick, (UNIX_TIMESTAMP(TimeClick)+'.$mySqlTZ.') as  StTC FROM mvdone'. $userId .' WHERE (idLearn<>0) ORDER BY idLearn';
$res = mysqli_query($link, $strSQL);
$mvEW =$ch;
$mvlastDate=$timenow;
//$mvlastA = $strSQL1;
while ($row = mysqli_fetch_array($res))
{ 

    $mvEW = $mvEW."{{~".$row['wordE'];
    $mvTrnsl =$mvTrnsl."{{~".$row['transl'];
    $mvTrnsc =$mvTrnsc."{{~".$row['transc'];
    $mviterE = $mviterE."{{~".$row['iterationE'];
    $mviterO = $mviterO."{{~".$row['iterationO'];
    $mviterOrow = $mviterOrow."{{~".$row['NS'];
    $mvdateSt = $mvdateSt."{{~".$row['date50'];
    $mvlastA = $mvlastA."{{~".$row['m'];
    $mvlastDate = $mvlastDate."{{~".$row['TimeClick'];

    $mvUnixLD = $mvUnixLD."{{~".$row['StTC'];

}

//echo $mvidSort."@(@".$mvW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mvDate."@(@".$mvPr."@(@".$mvOW."@(@".$mvNP."@(@".$mvIterationE;
echo $mvEW."@(@".$mvTrnsl."@(@".$mvTrnsc."@(@".$mviterE."@(@".$mviterO."@(@".$mviterOrow."@(@".$mvdateSt."@(@".$mvlastA."@(@".$mvlastDate."@(@".$mvUnixLD;

/////echo $strSQL1;
*/
?>


<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}
include("connect_db.php");

$secInDay=86400;
date_default_timezone_set('UTC');
$userId=$_SESSION['userId'];

//$dLearn=$_GET["dLearn"]; 
//$dlStampSt = mktime(0, 0, 0, substr($dLearn,5,2), substr($dLearn,8,2), substr($dLearn,0,4));
$ch=$_GET["ch"];
$timenow=mktime();
//$timenow=mktime(21, 0, 0, 5, 16, 2013);

$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 0";
$result = mysqli_query($link, $strSQL);




//сегодня отмеченные m=0
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>1) and m=0 and pr=50 and NS=0 and NS<100) LIMIT 5";
$result = mysqli_query($link, $strSQL);

//last don't now
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(3*60).") and m=-1  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT 5";
$result = mysqli_query($link, $strSQL);

//firdt don't now
//$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(3*60).") and m=-1  and pr=50 and idLearn<>1 and NS<100) ORDER BY idSort  DESC LIMIT 2";

//$result = mysqli_query($link, $strSQL);


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort DESC';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
//2 d
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(0.5*$secInDay).") and NS=1  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(10-$NRAll+4);
$result = mysqli_query($link, $strSQL);



$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
//2 d
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(0.5*$secInDay).") and NS=2  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(14-$NRAll+4);
$result = mysqli_query($link, $strSQL);




//2 d


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];

$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(2.5*$secInDay).") and NS=3  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(18-$NRAll+2);
$result = mysqli_query($link, $strSQL);


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(6.5*$secInDay).") and NS=4  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(20-$NRAll+2);
$result = mysqli_query($link, $strSQL);


$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
 
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(13.5*$secInDay).") and NS=5  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(22-$NRAll+1);
$result = mysqli_query($link, $strSQL);

$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(30.5*$secInDay).") and NS=6  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(23-$NRAll+1);
$result = mysqli_query($link, $strSQL);




$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<20)
{
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(30.5*$secInDay).") and NS=7 and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(24-$NRAll+1);
$result = mysqli_query($link, $strSQL);
}





//if not full  hhh
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<25)
{
$strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE ((".$timenow."-(UNIX_TIMESTAMP(TimeClickTmp)+".$mySqlTZ.")>".(1*60).") and m=-1  and pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(25-$NRAll);
$result = mysqli_query($link, $strSQL);    
}

 

//if not full
$strSQL = 'SELECT COUNT(*) FROM mvdone'. $userId .' WHERE (idLearn=1) ORDER BY idSort';
$res = mysqli_query($link, $strSQL); $row = mysqli_fetch_array($res); $NRAll = $row[0];
if ($NRAll<25)
{
 $strSQL = "UPDATE mvdone". $userId ." SET mvdone". $userId .".idLearn = 1 WHERE (pr=50 and idLearn<>1 and NS<100) ORDER BY TimeClick LIMIT ".(25-$NRAll);
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

//echo $strSQL1;
?>


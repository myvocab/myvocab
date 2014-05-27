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

$dLearn=$_GET["dLearn"]; 
$dlStampSt = mktime(0, 0, 0, substr($dLearn,5,2), substr($dLearn,8,2), substr($dLearn,0,4));

$dlStampStaaa = mktime(0, 0, 0, 1, 1, 1970);

$strSQL = "DROP TABLE mvs". $userId;
$result = mysqli_query($link, $strSQL);

$strSQL = "CREATE TABLE IF NOT EXISTS mvs". $userId ." (
  id int(11) NOT NULL AUTO_INCREMENT,
  wordE varchar(255) DEFAULT NULL,
  wordO varchar(255) DEFAULT NULL,
  wordTr varchar( 255 ) DEFAULT '',
  transc varchar(50) DEFAULT NULL,
  pr int(2) DEFAULT '0',
  transl longtext,
  flag int(11) DEFAULT '0',
  date50 datetime DEFAULT NULL,
  UNIQUE KEY id (id),
  UNIQUE KEY wordE (wordE)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
$result = mysqli_query($link, $strSQL);



$strSQL = "DELETE mvs". $userId .".* FROM mvs". $userId ;
$result = mysqli_query($link, $strSQL);
$ddd = date("Y.m.d", $dlStampSt).'@(@';
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50,  transl, transc 
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStampSt)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp = $dlStampSt - $secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc  
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);




$dlStamp = $dlStampSt - 2*$secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc  
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp = $dlStampSt - 5*$secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50,  transl, transc  
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp = $dlStampSt - 12*$secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc 
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp = $dlStampSt - 26*$secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc 
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp =  $dlStampSt - 56*$secInDay;
$strSQL="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc 
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL);

$dlStamp = $dlStampSt - 86*$secInDay;
$strSQL1="INSERT INTO mvs". $userId ."  (wordE, wordO, pr, date50, transl, transc)  
SELECT mvdone". $userId .".wordE, mvdone". $userId .".wordO, mvdone". $userId .".pr, mvdone". $userId .".date50, transl, transc  
FROM mvdone". $userId ." WHERE (((mvdone". $userId .".date50)='".date("Y.m.d", $dlStamp)."') and ((mvdone". $userId .".pr)=50)) ORDER BY mvdone". $userId .".date50, mvdone". $userId .".id DESC";
$result = mysqli_query($link, $strSQL1);

$strSQL="UPDATE mvs". $userId ." SET mvs". $userId .".flag = mvs". $userId .".id";
$result = mysqli_query($link, $strSQL);



/*
$strSQL ="UPDATE mvs". $userId ." INNER JOIN mt ON mvs". $userId .".wordE = mt.wordO SET mvs". $userId .".transc = mt.transc, mvs". $userId .".transl = mt.transl";
$result = mysqli_query($link, $strSQL);

$strSQL = "UPDATE mvs". $userId ." INNER JOIN mvedit". $userId ." ON mvs". $userId .".wordE = mvedit". $userId .".wordE SET mvs". $userId .".transc = mvedit". $userId .".transc, mvs". $userId .".transl = mvedit". $userId .".transl";
$result = mysqli_query($link, $strSQL);
*/

$res = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue=0 WHERE (FieldName="mvs")');

echo $dlStampSt.' '.date("Y.m.d", $dlStamp).' '.$strSQL1;
?>


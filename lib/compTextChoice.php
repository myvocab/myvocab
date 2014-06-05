<?php
session_start();
if ($_SESSION['userName'] == NULL) {
    
 $_SESSION['mess'] = '<font style="font-size:13px" color="#FF0000" face="Arial"><b>
               Не зарегистрировашись вы можете только читать текст</font></b><br>';

        header("Location:../textchoice.php");
              exit();
}
include("connect_db.php");
$idtext=$_GET["ch"];
$userId=$_SESSION['userId'];

$strSQL = "DELETE mv".$userId.".* FROM mv". $userId;
$result = mysqli_query($link, $strSQL);





$strSQL = "INSERT INTO mv".$userId." ( id, idSort, wordO, wordE, NP, iterationO, iterationE, flag, pr )  
SELECT uw" . $idtext . ".id, uw" . $idtext . ".id, uw" . $idtext .
".wordO, uw" . $idtext . ".wordO, uw" . $idtext . ".NP, uw" . $idtext . ".iteration, uw" . $idtext . ".iteration, 1, 0 
FROM uw" . $idtext ;
$result = mysqli_query($link, $strSQL);




$strSQL = "UPDATE mv".$userId." LEFT JOIN mveditl ON mv".$userId.".wordO = mveditl.wordO SET mv".$userId.".wordE = mveditl.wordE
WHERE ((Not (mveditl.wordE) Is Null))";
$result = mysqli_query($link, $strSQL);




$strSQL = "UPDATE mv".$userId." LEFT JOIN mveditl".$userId." ON mv".$userId.".wordO = mveditl".$userId.".wordO SET mv".$userId.".wordE = mveditl".$userId.".wordE
WHERE ((Not (mveditl".$userId.".wordE) Is Null))";
$result = mysqli_query($link, $strSQL);


$strSQL = "UPDATE mv".$userId." LEFT JOIN mvedit".$userId." ON mv".$userId.".wordE = mvedit".$userId.".wordE SET mv".$userId.".transl = mvedit".$userId.".transl, mv".$userId.".transc = mvedit".$userId.".transc, mv".$userId.".wordTr = mvedit".$userId.".wordTr 
WHERE ((Not (mvedit".$userId.".wordE) Is Null))";
$result = mysqli_query($link, $strSQL);



$strSQL = "UPDATE mv".$userId." LEFT JOIN mvedit ON mv".$userId.".wordE = mvedit.wordE SET mv".$userId.".transl = mvedit.transl, mv".$userId.".transc = mvedit.transc, mv".$userId.".wordTr = mvedit.wordTr 
WHERE ((Not (mvedit.wordE) Is Null) and ((mv".$userId.".transl) is Null))";
$result = mysqli_query($link, $strSQL);


$strSQL = "UPDATE mv".$userId." LEFT JOIN mt ON mv".$userId.".wordE = mt.wordO SET mv".$userId.".transl = mt.transl, mv".$userId.".transc = mt.transc, mv".$userId.".wordTr = mt.wordTr  
WHERE ((Not (mt.wordO) Is Null) AND ((mv".$userId.".transl) is Null))";
$result = mysqli_query($link, $strSQL);



$strSQL = "UPDATE mv".$userId." LEFT JOIN mvdone".$userId." ON mv".$userId.".wordE = mvdone".$userId.".wordE SET mv".$userId.".date50 = mvdone".$userId.".date50, mv".$userId.".pr = mvdone".$userId.".pr   
WHERE (Not (mvdone".$userId.".pr) Is Null)";
$result = mysqli_query($link, $strSQL);


$strSQL = "UPDATE mv".$userId." INNER JOIN mvdel".$userId." ON mv".$userId.".wordE = mvdel".$userId.".wordE SET mv".$userId.".pr = -1";

$result = mysqli_query($link, $strSQL);



$strSQL = "UPDATE mv".$userId." INNER JOIN mvdel ON mv".$userId.".wordE = mvdel.wordE SET mv".$userId.".pr = -1";
$result = mysqli_query($link, $strSQL);



$strSQL = "CREATE TABLE IF NOT EXISTS mvidsort". $userId ." (
  id int(11) NOT NULL AUTO_INCREMENT,
  iterationE int(11) DEFAULT '0',
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
$result = mysqli_query($link, $strSQL);




$strSQL = "INSERT INTO mvidsort". $userId ." ( id, iterationE )
SELECT Min(mv". $userId .".id) as mid, Sum(mv". $userId .".iterationO) AS SiterationO FROM mv". $userId ." GROUP BY mv". $userId .".wordE";
$result = mysqli_query($link, $strSQL);


$strSQL = "UPDATE mv".$userId." INNER JOIN mvidsort".$userId." ON mv".$userId.".id = mvidsort".$userId.".id SET mv".$userId.".iterationE = mvidsort".$userId.".iterationE, mv".$userId.".flag = 0";
$result = mysqli_query($link, $strSQL);



$strSQL = "DROP TABLE mvidsort". $userId;
$result = mysqli_query($link, $strSQL);







$strSQL = "UPDATE infotmp".$userId."  SET infotmp".$userId.".FieldValue = " . $idtext . " WHERE (infotmp".$userId.".FieldName = 'CBook')";
$result = mysqli_query($link, $strSQL);






$strSQL = "SELECT infotmp".$userId.".FieldName FROM infotmp". $userId . " WHERE (infotmp".$userId.".FieldName =
'idStartPage" . $idtext . "')";
$result = mysqli_query($link, $strSQL);
   
   if (mysqli_num_rows($result) == 0) {
$strSQL = "INSERT INTO infotmp".$userId." (FieldName, FieldValue) SELECT 'idStartPage".$idtext."', 1" ;
$result = mysqli_query($link, $strSQL);}
 
 $strSQL = "SELECT infotmp".$userId.".FieldName FROM infotmp". $userId . " WHERE (infotmp".$userId.".FieldName =
'b" . $idtext . "')";
$result = mysqli_query($link, $strSQL);
   
   if (mysqli_num_rows($result) == 0) {
$strSQL = "INSERT INTO infotmp".$userId." (FieldName, FieldValue) SELECT 'b".$idtext."', 1" ;
$result = mysqli_query($link, $strSQL);}

  

header("Location: ../textwords.php"); 
?>


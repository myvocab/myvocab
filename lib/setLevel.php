<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}

$userId=$_SESSION['userId'];
include("connect_db.php");
date_default_timezone_set('UTC');

$nLev=htmlspecialchars($_GET["nLev"]); 
$dLev=htmlspecialchars($_GET["dLev"]);
$weLev=htmlspecialchars(Trim($_GET["weLev"]));
$wtrLev=htmlspecialchars(Trim($_GET["wtrLev"]));
$woLev=htmlspecialchars(Trim($_GET["woLev"]));
$cBook=htmlspecialchars(Trim($_GET["cBook"]));
$chLearn =htmlspecialchars(Trim($_GET["chLearn"]));

if ($chLearn == "r"){
$res = mysqli_query($link, 'SELECT infotmp'. $userId .'.* FROM infotmp'. $userId.' WHERE FieldName="CBook"' );
while ($row = mysqli_fetch_array($res)){$cBook = $row['FieldValue'];}
}


$result = mysqli_query($link, 'UPDATE mv'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvs'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvr'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvv'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvdone'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.', TimeClick="'.date("Y-m-d H:i:s").'", NS=0, iterationE=0, iterationO=0, m=0 WHERE (wordE="'.$weLev.'")');



if ($nLev == 0){
$result = mysqli_query($link, 'Delete mvdone'. $userId .'.* FROM mvdone'. $userId .' WHERE (wordE="'.$weLev.'")');
}




if ($chLearn == "r"){
if ($nLev != 0)  {
$result = mysqli_query($link, 'Delete mvdone'. $userId .'.* FROM mvdone'. $userId .' WHERE (wordE="'.$weLev.'")');
   
$strSQL = "INSERT INTO mvdone". $userId ." ( wordO, wordE,  transc, transl, pr, date50, TimeClickTmp, NT, TimeClick) 
SELECT mv". $userId .".wordO, mv". $userId .".wordE, mv". $userId .".transc, mv". $userId .".transl, mv". $userId .".pr, mv". $userId .".date50, '".date('Y-m-d H:i:s')."' AS  ss2, ".$cBook." AS nb, '".date('Y-m-d H:i:s')."' AS  ss 
FROM mv". $userId ." WHERE (((mv". $userId .".wordO)='" . $woLev ."'))";

$strSQL = "INSERT INTO mvdone". $userId ." ( wordO, wordE, wordTr, transc, transl, pr, date50, TimeClickTmp, NT, TimeClick) SELECT mv". $userId .".wordO, mv". $userId .".wordE, mv". $userId .".wordTr, mv". $userId .".transc, mv". $userId .".transl, mv". $userId .".pr, mv". $userId .".date50, '".date('Y-m-d H:i:s')."' AS  ss2, ".$cBook." AS nb, '".date('Y-m-d H:i:s')."' AS  ss 
FROM mv". $userId ." WHERE (((mv". $userId .".wordO)='" . $woLev ."'))";



$result = mysqli_query($link,$strSQL);
}
}




// edit table for learn
////////$result = mysqli_query($link, 'UPDATE mvs'. $userId .' SET date50="'.$dLev.'" WHERE (wordE="'.$weLev.'")');
/////////$result = mysqli_query($link, 'UPDATE mvr'. $userId .' SET date50="'.$dLev.'" WHERE (wordE="'.$weLev.'")');
// end edit table for learn



echo  $nLev;
//echo $chLearn;
?>


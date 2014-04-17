<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}

$userId=$_SESSION['userId'];
include("connect_db.php");
$nLev=htmlspecialchars($_GET["nLev"]); 
$dLev=htmlspecialchars($_GET["dLev"]);
$weLev=htmlspecialchars(Trim($_GET["weLev"]));
$woLev=htmlspecialchars(Trim($_GET["woLev"]));

//$res = mysqli_query($link, 'SELECT infotmp'. $userId .'.* FROM infotmp'. $userId.' WHERE FieldName="CBook"' );
//while ($row = mysqli_fetch_array($res)){$cBook = $row['FieldValue'];}
$cBook=0;


$result = mysqli_query($link, 'UPDATE mv'. $userId .' SET date50="'.$dLev.'",  pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvs'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvr'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');
$result = mysqli_query($link, 'UPDATE mvv'. $userId .' SET date50="'.$dLev.'", pr='.$nLev.' WHERE (wordE="'.$weLev.'")');








if ($nLev != 0)  {
$result = mysqli_query($link, 'UPDATE mvdone'. $userId .' SET date50="'.$dLev.'", TimeClickTmp="'.date("Y-m-d H:i:s").'", pr='.$nLev.',  TimeClick="'.date("Y-m-d H:i:s").'", NS=0, iterationE=0, iterationO=0, m=0  WHERE (wordE="'.$weLev.'")');
}


if ($nLev == 0)  {
$sqlStr='Delete mvdone'. $userId .'.* FROM mvdone'. $userId .' WHERE (wordE="'.$weLev.'")';
$result = mysqli_query($link, $sqlStr);
}




// edit table for learn
////////$result = mysqli_query($link, 'UPDATE mvs'. $userId .' SET date50="'.$dLev.'" WHERE (wordE="'.$weLev.'")');
/////////$result = mysqli_query($link, 'UPDATE mvr'. $userId .' SET date50="'.$dLev.'" WHERE (wordE="'.$weLev.'")');
// end edit table for learn



echo  $nLev." ".$sqlStr;
?>


<?php
include("lib/connect_db.php");


for ($i = 1; $i <= 150; $i++) {

//$strSQL = 'ALTER TABLE mvdone'.$i.' ADD date50tmp DATE NULL AFTER date50';
//$strSQL = 'UPDATE mvdone'.$i.' SET mvdone'.$i.'.date50tmp = mvdone'.$i.'.date50';


$strSQL = 'ALTER TABLE mvdone'.$i.' CHANGE date50tmp TimeClickTmp TIMESTAMP NULL DEFAULT NULL ';
$res = mysqli_query($link, $strSQL);
$strSQL = 'UPDATE mvdone'.$i.' SET mvdone'.$i.'.TimeClickTmp = mvdone'.$i.'.TimeClick';
$res = mysqli_query($link, $strSQL);

}

?>
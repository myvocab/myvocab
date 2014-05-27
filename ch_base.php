<?php
include('lib/connect_db.php');
for ($i = 1; $i <= 110; $i++) {
$strSQL =   "ALTER TABLE  mv".$i." ADD  wordTr VARCHAR( 255 ) NULL DEFAULT  "."''"." AFTER  wordO";

$result = mysqli_query($link,$strSQL);

}

for ($i = 1; $i <= 110; $i++) {
$strSQL =   "ALTER TABLE  mvedit".$i." ADD  wordTr VARCHAR( 255 ) NULL DEFAULT  "."''"." AFTER  wordE";

$result = mysqli_query($link,$strSQL);

}
echo $mySqlTZ;
?>

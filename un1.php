<?php
//session_start();
//echo "usernemr - ".$_SESSION['userName'];
include("lib/connect_db.php");

$strSQL =   'SELECT ip FROM stlog WHERE 1';
//$strSQL =   'SELECT id, flag, wordE, pr FROM mv3 WHERE wordO="table" ORDER BY id';
$res = mysqli_query($link, $strSQL);
echo  mysqli_num_rows($res)."</BR>"; 


$strSQL =   'SELECT * FROM stlog ORDER BY dt DESC LIMIT 0 , 20';
//$strSQL =   'SELECT * FROM stlog WHERE page = 62;
$res = mysqli_query($link, $strSQL);

while ($row = mysqli_fetch_array($res))
{
echo $row['ip']."--".$row['page']."--".$row['dt']."</BR>";
}
?>

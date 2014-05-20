<?php
session_start();
include('../lib/connect_db.php');
$userId=$_SESSION['userId'];



$strSQL =   'SELECT id, wordO, wordE, transl, idSort, pr, flag, date50, transc, iterationE, NP, iterationO, NS FROM mvdone'.$userId . ' ORDER BY id LIMIT 2,1';
$res = mysqli_query($link, $strSQL);


$row = mysqli_fetch_array($res);

// echo  $row['wordE']."<BR>";

$wordEtmp=$row['wordE'];

echo $wordEtmp;

   
echo  $strSQL;
?>

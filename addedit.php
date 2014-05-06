<?php
include("lib/connect_db.php");
$strSQL = "UPDATE mvedit_www SET mvedit_www.m = 0";
$result = mysqli_query($link, $strSQL);

$strSQL = "UPDATE mveditl_www SET mveditl_www.m = 0";
$result = mysqli_query($link, $strSQL);

$strSQL = "UPDATE mveditl_www LEFT JOIN mveditl ON mveditl_www.wordO = mveditl.wordO SET mveditl_www.m = 1
WHERE (((mveditl.wordO) Is Null))";
$result = mysqli_query($link, $strSQL);

$strSQL = "INSERT INTO mveditl ( wordO, wordE ) SELECT mveditl_www.wordO, mveditl_www.wordE FROM mveditl_www WHERE (((mveditl_www.m)=1))";
$result = mysqli_query($link, $strSQL);

$strSQL = "UPDATE mvedit_www LEFT JOIN mvedit ON mvedit_www.wordE = mvedit.wordE SET mvedit_www.m = 1
WHERE (((mvedit.wordE) Is Null))";
$result = mysqli_query($link, $strSQL);

$strSQL = "INSERT INTO mvedit ( wordE, transc, transl ) SELECT mvedit_www.wordE, mvedit_www.transc, mvedit_www.transl FROM mvedit_www WHERE (((mvedit_www.m)=1))";
$result = mysqli_query($link, $strSQL);


?>

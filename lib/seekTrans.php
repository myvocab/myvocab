<?php
session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}
$userId=$_SESSION['userId'];
include("connect_db.php");
$eWord=htmlspecialchars($_GET["eWord"]); 


$strSQL = 'SELECT * FROM mvedit'. $userId .' WHERE wordE = "'. $eWord.'"' ;
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 


if (mysqli_num_rows($res)== 0 )
{
$strSQL = 'SELECT * FROM mvedit WHERE wordE = "'. $eWord.'"' ;
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res); 
}


if (mysqli_num_rows($res)== 0 )
{
$strSQL = 'SELECT * FROM mt WHERE wordO  = "'. $eWord.'"' ;
$res = mysqli_query($link, $strSQL);
$row = mysqli_fetch_array($res);    
} 

$iWord = $row[transc]."@(@".$row[transl]."@(@".$row[wordTr];




echo  $iWord;


?>


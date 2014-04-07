<?php

session_start();
if ($_SESSION['userName'] == NULL) {
        header("Location:index.php");
              exit();
}
$userId=$_SESSION['userId'];
include("connect_db.php");

$we=trim($_POST["eWord"]);
$wo=trim($_POST["oWord"]);
$tr=trim($_POST["tr"]);
$tc=trim($_POST["tc"]);


$we = mysqli_real_escape_string($link,$we);
$wo = mysqli_real_escape_string($link,$wo);
$tr = mysqli_real_escape_string($link,$tr);
$tc = mysqli_real_escape_string($link,$tc);

//$tr = mysqli_real_escape_string($tr);

$strSQL = 'Delete mvedit'.$userId.'.* FROM mvedit'.$userId.' WHERE (((mvedit'.$userId.'.wordE)="'.$we.'"))' ;
$result = mysqli_query($link, $strSQL);

$strSQL = 'Delete mveditl'.$userId.'.* FROM mveditl'.$userId.' WHERE (((mveditl'.$userId.'.wordO)="'.$wo.'"))' ;
$result = mysqli_query($link, $strSQL);                                

$strSQL = 'INSERT INTO mvedit'.$userId.' (wordE, transl, transc ) VALUES ("'.$we.'" , "'.$tr.'", "'.$tc.'")' ;
$result = mysqli_query($link, $strSQL);

$strSQL = 'INSERT INTO mveditl'.$userId.' (wordO, wordE ) VALUES ("'.$wo.'", "'.$we.'")' ;
$result = mysqli_query($link, $strSQL);


$strSQL = 'UPDATE mvdone'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);




//update this word in mv
$strSQL = 'UPDATE mv'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordO="'.$wo.'")';
$result = mysqli_query($link, $strSQL);

//update all word in mv
$strSQL = 'UPDATE mv'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);


$strSQL = 'UPDATE mv'.$userId.' SET flag=2 WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);

$strSQL = 'UPDATE mv'.$userId.' SET flag=0 WHERE (wordE="'.$we.'") ORDER BY id LIMIT 1';
$result = mysqli_query($link, $strSQL);
//$result = mysqli_query($link, 'UPDATE infotmp'. $userId .' SET FieldValue='.$idStart.' WHERE (FieldName="b'.$CBook.'")');



$strSQL = 'UPDATE mv'.$userId.' RIGHT JOIN mvdone'.$userId.' ON mv'.$userId.'.wordE = mvdone'.$userId.'.wordE 
SET mv'.$userId.'.date50 = mvdone'.$userId.'.date50, mv'.$userId.'.pr = mvdone'.$userId.'.pr
WHERE (((mvdone'.$userId.'.wordE)="'.$we.'"))';

$result = mysqli_query($link, $strSQL);



$strSQL = 'UPDATE mvv'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);

$strSQL = 'UPDATE mvs'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);

$strSQL = 'UPDATE mvr'.$userId.' SET wordE="'.$we.'", transl="'.$tr.'", transc="'.$tc.'"
WHERE (wordE="'.$we.'")';
$result = mysqli_query($link, $strSQL);




$strSQL =   'SELECT flag, pr, date50 FROM mv'.$userId.' WHERE wordO="'.$wo.'" ORDER BY id';
$res = mysqli_query($link, $strSQL);
while ($row = mysqli_fetch_array($res)){$flag = $row['flag']; $dt = $row['date50']; $pr = $row['pr'];}
$dt=substr($dt,0,4).".".substr($dt,5,2).".".substr($dt,8,2);
echo $flag.'@(@'.$dt.'@(@'.$pr;




$userId='';

$strSQL = 'Delete mvedit'.$userId.'.* FROM mvedit'.$userId.' WHERE (((mvedit'.$userId.'.wordE)="'.$we.'"))' ;
$result = mysqli_query($link, $strSQL);

$strSQL = 'Delete mveditl'.$userId.'.* FROM mveditl'.$userId.' WHERE (((mveditl'.$userId.'.wordO)="'.$wo.'"))' ;
$result = mysqli_query($link, $strSQL);                                

$strSQL = 'INSERT INTO mvedit'.$userId.' (wordE, transl, transc ) VALUES ("'.$we.'" , "'.$tr.'", "'.$tc.'")' ;
$result = mysqli_query($link, $strSQL);

$strSQL = 'INSERT INTO mveditl'.$userId.' (wordO, wordE ) VALUES ("'.$wo.'", "'.$we.'")' ;
$result = mysqli_query($link, $strSQL);




?>
                                                               

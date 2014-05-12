<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<link href="css/windows.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
include('../lib/connect_db.php');

$wr="";

$curlObject = curl_init();
curl_setopt($curlObject, CURLOPT_URL, $url);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlObject, CURLOPT_RETURNTRANSFER, true); 


$userId=$_SESSION['userId'];

$strSQL =   'SELECT wordE FROM mvdone'.$userId." ORDER BY wordE" ;
$res = mysqli_query($link, $strSQL);
 $i=1;
while ($row = mysqli_fetch_array($res))
{
 $wordT = $row['wordE'];   
//echo $row['wordE'].$i;

$i=$i+1;



//$wordT="kno11";
  $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?' .
        'key=trnsl.1.1.20140511T060153Z.21a5cb00a6cbec4e.f4e419fa60359a8adce56328118561d1c89fc136&' .
        'text='.$wordT.'&' .
        'lang=ru&' .
        'format=plain&' .
        'options=1';
  
  
//echo $url;
 


 
 
 
$responseData = curl_exec($curlObject);
 
echo  $wordT."<BR>";
}   
/*
 
//if ($responseData === false) {
//    throw new Exception('Response false');
//}

//echo "aaa";

$obj = json_decode($responseData);
//var_dump(json_decode($responseData, true));
//echo  $obj->{"text"}[0];

//$wordT = $row['wordE'];$wordT = $row['wordE'];
//echo $obj->{"text"}[0]."<BR>";

$wr = $obj->{"text"}[0];
//echo $wordT.'-'. $userId.$obj->{"text"}[0]."<BR>"; 
$strSQL =   'UPDATE mvdone'. $userId.' SET wordR="'.$wr.'" WHERE wordE="'.$wordT.'"';
$res = mysqli_query($link, $strSQL);
//echo  $obj->{"text"}[0];
}
*/
curl_close($curlObject);
echo $i;
?>

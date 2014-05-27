<?php
//session_start();
include('../lib/connect_db.php');
//$userId=$_SESSION['userId'];

for ($i = 0; $i <= 5000; $i++) {

$strSQL =   'SELECT  wordO FROM mt  WHERE wordTr="" ORDER BY wordO LIMIT '.$i.',1';
//echo $strSQL."</BR>";
$res = mysqli_query($link, $strSQL);


$row = mysqli_fetch_array($res);

// echo  $row['wordE']."<BR>";

$wordEtmp=$row['wordO'];

$url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?' .
        'key=trnsl.1.1.20140511T060153Z.21a5cb00a6cbec4e.f4e419fa60359a8adce56328118561d1c89fc136&' .
        'text='.$wordEtmp.'&' .
        'lang=ru&' .
        'format=plain&' .
        'options=1'; 
  
    
$curlObject = curl_init();
curl_setopt($curlObject, CURLOPT_URL, $url);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlObject, CURLOPT_RETURNTRANSFER, true);     

$responseData = curl_exec($curlObject);
$obj = json_decode($responseData);
//$responseData = curl_exec($curlObject);
//$wordRA =  iconv("UTF-8", "CP1251" ,$obj->{"text"}[0]);
$wordRA =  $obj->{"text"}[0];

$strSQL = 'UPDATE mt SET mt.wordTr="'.$wordRA.'" WHERE (((mt.wordO))="'.$wordEtmp.'")';

//UPDATE mvdone3 SET mvdone3.wordTr = "dd" WHERE (((mvdone3.wordE)="dd"));
$res = mysqli_query($link, $strSQL);
//echo $wordRA."-".$wordEtmp.$strSQL."<BR>";
//echo $strSQL."</BR>";
}    
echo  $i.$strSQL;
?>

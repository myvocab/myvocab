
<?php
include 'PHP_Text2Speech.class.php'; 
    $t2s = new PHP_Text2Speech; 

//$t2s->lang="en";

$wordE='door';
$wordR="дверь";

$dd=$t2s->speak($wordE);
rename($dd, $t2s->audioDir.iconv("UTF-8", "CP1251" , $wordE).".mp3");

$fileFinish=$wordE.'-'.iconv("UTF-8", "CP1251" , $wordR).'.mp3';


for ($i = 1; $i <= strlen($wordE); $i++) {
    echo $wordE[$i-1];
file_put_contents('audio/'.$i.$fileFinish,file_get_contents('audio/'.($i-1).$fileFinish.'.mp3').file_get_contents('audio/'.$wordE[$i].".mp3"));
}



$t2s->lang="ru";
$dd=$t2s->speak($wordR);
rename($dd, $t2s->audioDir.iconv("UTF-8", "CP1251" , $wordR).".mp3");





//file_put_contents('audio/'.$wordE.'-'.iconv("UTF-8", "CP1251" , $wordR).'.mp3',file_get_contents('audio/'.$wordE.'.mp3').file_get_contents('audio/'.iconv("UTF-8", "CP1251" , $wordR).".mp3"));

echo strlen($wordE);
?>

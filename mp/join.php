<?php
include 'PHP_Text2Speech.class.php'; 
    $t2s = new PHP_Text2Speech; 

file_put_contents('audio/A1.mp3',file_get_contents('audio/A1.mp3').file_get_contents('audio/B1.mp3'));

//$dd=$t2s->speak($wordE);
//rename($dd, $t2s->audioDir.iconv("UTF-8", "CP1251" , $wordE).".mp3");

//  file_put_contents('new.mp3',file_get_contents('audio/table.mp3').file_get_contents('audio/table2.mp3'));
?>

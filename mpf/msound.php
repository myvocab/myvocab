<?php

$wordEtmp = $_GET["wordEA"];
$wordEtr='eng/'.strtoupper($wordEtmp); 

if (!file_exists ('audio/'.$wordEtr.'.mp3'))
 {
  include 'PHP_Text2Speech.class.php'; 
  
  $wordE=strtoupper($wordEtmp);  
  
    
 $t2s = new PHP_Text2Speech; 
  $dd=$t2s->speak($wordE);
  rename($dd, $t2s->audioDir.$wordEtr.".mp3");
  file_put_contents('audio/'.$wordEtr.'.mp3',file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/p1.mp3'));
  file_put_contents('audio/'.$wordEtr.'.mp3',file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/p1.mp3'));
  }
 

//echo strtoupper($_GET["wordEA"]);
echo strtoupper($wordEtmp);
?>

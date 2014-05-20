<?php
include 'PHP_Text2Speech.class.php'; 
    $t2s = new PHP_Text2Speech; 
//    echo "dd".$t2s; 
 $p = "  , , ,. ,    . , .   . ,    ., .   ./  /  ,  ., . /. , /. , / , / ,/ ., / , / , / ,/ , / ,/ , / , , ; , ; , ; , ; ;::::::::;;;;;;;;;;;:::::::::::::;;;;;;, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ";
 $a='A'.$p.'BC'    
?> 
<audio controls="controls" autoplay="autoplay"> 
 <source src="<?php echo $t2s->speak($a);?>" type="audio/mp3" /> 
</audio>






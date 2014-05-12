<?php
include 'PHP_Text2Speech.class.php'; 
    $t2s = new PHP_Text2Speech; 
//    echo "dd".$t2s; 
 //$p = " , ; , ; , ; , ; ;::::::::;;;;;;;;;;;:::::::::::::;;;;;;, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ";
     
?> 
<audio controls="controls" autoplay="autoplay"> 
 <source src="<?php echo $t2s->speak('fff');?>" type="audio/mp3" /> 
</audio>
<?php
echo$t2s->speak('fff');
?>



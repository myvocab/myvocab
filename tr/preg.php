<?php


   $login = 'До,рмидо\'нт';
    
 //   if(!preg_match('#^[a-zа-яё\'0-9]+$#ui', $login))
 if(!preg_match('#^[a-zа-яё]+$#ui', $login))
        echo 'Not!';     
    else
        echo 'Yes';

?> 
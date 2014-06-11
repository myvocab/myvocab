<?php
$subject = "a";
$pattern = '[a-z]';
echo preg_match($pattern, $subject, $matches)."aaa";
//print_r($matches);
?> 
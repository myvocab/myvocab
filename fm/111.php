<?
//$filename = "1.txt";
//$fh = fopen($filename, "r"); 
//$fh = fopen($filename, "r") or die("Can't open file!");
//$file = fread($fh, filesize($fh));









$fh = fopen("1.txt", "r"); 
//print filesize("1.txt");
//while (! feof($fh)) : 

//print fgetss($fh,1);
  
$file = fread($fh, filesize("1.txt")); 
//if ($file[1]=="\n") {echo "yes";}
//if ($file[0]=="g") {echo "yes";}
//print $file;
//endwhile; 
echo ord($file[0])." ";
echo ord($file[1])." ";
echo ord($file[2]).$file[2]." ";
fclose($fh); 


//echo "222".filesize($fh);


?>

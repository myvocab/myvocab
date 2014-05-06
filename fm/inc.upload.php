<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: inc.upload.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
session_start();
//require '../config.php';
include("connect_db.php");
 
 
 
if (!defined("main_file"))
{exit;}
$dir =$start_dir_in;
//$dir = @$_POST['DIR'];
$file = @$_FILES["FILE"]["tmp_name"];
$file_name = $_FILES["FILE"]["name"];
echo $file." ".$file_name;
exit;
//if ($dir ==  "" or $file == "")
if ( $file == "")
{
	print "<center><u>Ошибка:</u> заполнены не все поля формы!</center>";
}
else
{
	if (!is_dir($dir))
	{print "<center><u>Ошибка:</u> указанной директории не существует на сервере ".$_SERVER['HTTP_HOST']."</center>";}
	else
	{
		if (!is_writable($dir))
		{
	print "<center><u>Ошибка:</u> загрузка в указанную директорию невозможна! Отсутствуют права доступа</center>";
		}
		else
			{
		$file_name = $_FILES["FILE"]["name"];
		if (@move_uploaded_file($file, "v2/$file_name"))
		{
			print "<center>Загрузка файла $file_name в директорию успешно завершена!</center>";
         
       $link = mysql_connect($sql_host, $sql_user, $sql_pass);
       mysql_select_db($sql_db);
       mysql_query("SET NAMES 'utf8'");  
         
         
         $FFN =  mysql_real_escape_string($file_name); 
         $snd = $_SESSION['user']; 
       $to_insert = "'$FFN', '".mysql_real_escape_string($snd)."', '". date('Y-m-d H:i:s')."')";
       
//         $to_insert = "'$FFN', '".mysql_real_escape_string($snd)."')";
// '". date('Y-m-d H:i:s')."'
   $query = @mysql_query("INSERT INTO ".SQL_PREFIX."logfiles (namefile,  sender, dt) VALUES (" . $to_insert);  
            
            
            
            
            
            
		}
		else
		{
			print "<center><u>Ошибка:</u> невозможно загрузить файл $file!</center>";
		}
			}
	}
}




?>
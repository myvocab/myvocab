<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: inc.listing.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
if (!defined("main_file"))
{exit;}

		if (isset($_REQUEST['makedir']))
		{
			print "<form action=?do=listing&makedir&DIR=".@$_REQUEST['DIR']."&done method=post>Имя новой директории: <input type=text name=dir_name> <input type=submit value=Создать></form>";
			if (isset($_REQUEST['done']))
			{
				$dir = @$_REQUEST['DIR'];
				$dir_name = @$_REQUEST['dir_name'];
				if (is_dir($dir))
				{
					if (ereg("[\/\:\*\?\"<>\|]", $dir_name))
					{
						print "<center><u>Внимание:</u> имя не должно содержать символов / \ : * ? \" <> | </center><br>";
					}	
					else
					{
						if (is_writable($dir))
						{
						 if (!is_dir("$dir/$dir_name")){
						mkdir("$dir/".trim($dir_name)."");
						print "<center>Директория $dir/$dir_name успешно создана!</center><br>";}
						else
							{print "<center><u>Ошибка:</u> такая директория уже существует!</center><br>";}
						}
						else
						{
							print "<center><u>Ошибка:</u> невозможно создать директорию! Отсутствуют права доступа</center><br>";
						}
					}
				}
				else
				{
					print "<center><u>Ошибка:</u> директория $dir не найдена!</center><br>";
				}
			}
		}
		if (isset($_REQUEST['unlink']))
		{
			$unlink = $_REQUEST['unlink'];
			$deleted = false;
			if (is_dir($unlink))
			{
				del_dir($unlink);
				$deleted = true;
				print "<center>Удаление директории $unlink успешно завершено!</center><br>";
			}
			if (file_exists($unlink) and $deleted == false)
			{
				$get_dir = ereg_replace ("\/([^\/]*)([^\/]$)", "", $unlink);
				if (!is_writable($get_dir) or !is_writable($unlink))
				{
					print "<center><u>Ошибка:</u> невозможно удалить выбранный файл! Отсутствуют права доступа</center><br>";
				}else
				{
					unlink ($unlink);
					print "<center>Удаление файла $unlink успешно завершено!</center><br>";
				}
			}else if(!file_exists($unlink) and $deleted == false){
				print "<center><u>Ошибка:</u> объект $unlink не найден!</center><br>";
			}
		$dir = ereg_replace ("\/([^\/]*)([^\/]$)", "",$unlink);
		}
		if (isset($_REQUEST['rename']))
		{
		$rename = $_REQUEST['rename'];
		
        if (!file_exists($rename) and !is_dir($rename))
			{
			print "<center><u>Ошибка:</u> объект $rename не найден!</center><br>";
			}
		else
					{
		$get_name = ereg_replace ("(.*)\/", "", $rename);
		$dir = ereg_replace ("\/([^\/]*)([^\/]$)", "",$rename);
			if (isset($_REQUEST['done']))
			{
				if (is_writable($rename) and is_writable($dir))
							{
				if (ereg("[\/\:\*\?\"<>\|]", $_POST['new_name']))
				{print "<center><u>Внимание:</u> имя не должно содержать символов / \ : * ? \" <> | </center><br>";}
				else
				{
					rename ($_REQUEST['rename'], "$dir/".trim($_POST['new_name']));
					$rename = "$dir/".$_POST['new_name'];
					print "<center>Имя файла/директории $get_name успешно изменено</center><br>";
					$get_name = ereg_replace ("(.*)\/", "", $rename);
				}
							}
							else
				{
						print "<center><u>Ошибка:</u> невозможно переименовать выбранный файл/директорию! Отсутствуют права доступа</center><br>";
				}
			}
			print "<form action=?do=listing&rename=$rename&done method=post>Введите новое имя файла/директории: <input type=text name=new_name value=\"$get_name\"> <input type=submit value=Переименовать></form>";
					}
		}



        
          if (isset($_REQUEST['dwld']))
        {
        $dwld = $_REQUEST['dwld'];
       
        if (!file_exists($dwld) and !is_dir($dwld))
            {
            print "<center><u>Ошибка:</u> объект $dwld не найден!</center><br>";
            }
        else
                    {
        $get_name = ereg_replace ("(.*)\/", "", $dwld);
        $dir = ereg_replace ("\/([^\/]*)([^\/]$)", "",$dwld);
       $get_full_name = "$ddir/".$dfile;
       
       
       
       $FlSize = FileSize($get_full_name);
If(IsSet($_SERVER['HTTP_USER_AGENT']) and StrPos($_SERVER['HTTP_USER_AGENT'],'MSIE'))
Header('Content-Type: application/force-download');
Else
Header('Content-Type: application/octet-stream');
Header("Accept-Ranges: bytes");
Header("Content-Length: ".$FlSize);
Header("Content-Disposition: attachment; filename=$dfile");
ReadFile($get_full_name);
                                 
                     }
        }

  
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

			if (isset($dir) and is_dir($dir))
		{
				$prev_dir = ereg_replace ("\/([^\/]*)([^\/]$)", "", $dir);






				print "
<script>
function del_wind(url, fid) {
var x = confirm(\"Вы действительно хотите удалить объект \"+fid+\"?\");
if (x == true){
window.location=url;
}
}
</script>";
//      print    "<table width=95% align=center border=1><tr><td colspan=5><a href=?do=listing&DIR=$prev_dir title=\"Prev Directory\"><<<</a> <b>$dir</b></td></tr><tr><td><b>Файл/Директория</b></td><td><b>Создан</b></td><td><b>Изменен</b></td><td><b>Размер</b></td><td><b>Действие</b></td></tr>"; 
  
      print    "<table width=95% align=center border=1><tr><td></td></tr><tr><td><b>Файлы для скачивания</b></td><td><b>Создан</b></td><td><b>Изменен</b></td><td><b>Размер</b></td><td><b>Действие</b></td></tr>"; 

			$handle = opendir ($dir);
			while ($file = readdir($handle)){
				if ($file == "." or $file == "..")
				{continue;}
				print "<tr><td>$file</td><td>".date ("d.m.Y", filectime("$dir/$file"))."</td><td>".date ("d.m.Y", filemtime("$dir/$file"))."</td><td>";
				if (filetype("$dir/$file") == "file"){
				print round(filesize("$dir/$file")/1024, 2);}
				else
				{
				$cnt_size = 0;
				$cnt_size = get_size("$dir/$file", $cnt_size);
				print round($cnt_size/1024, 2);
				}
				print " кб</td><td><a href=\"?do=download&ddir=$dir&dfile=$file">[скачать]</a> <a href=\"javascript:del_wind('?do=download&unlink=$dir/$file', '$file')\">[удалить]</a>";
				if (filetype("$dir/$file") == "dir"){
				print " <a href=\"?do=listing&DIR=$dir/$file\">[перейти]</a>";
				}
				print "</td></tr>";
			}
			print "</table>";
//print "<br><center><a href=?do=create&DIR=$dir>[создать файл]</a> <a href=?do=listing&makedir&DIR=$dir>[создать папку]</a></center>";
		}
		else if (!is_dir($dir)){print  $dir."<center>Указанной директории sне существует</center>";}
?>
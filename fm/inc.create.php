<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: inc.create.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
if (!defined("main_file"))
{exit;}
				print "<br>";
				$fname = trim(@$_POST['fname']);
				$dir = @$_POST['DIR'];
				$content = @$_POST['content'];
				if ($fname == "" or $dir == "")
			{
					print "<center><u>Ошибка:</u> заполнены не все поля формы!</center>";
			}
			else
			{
				if (!is_dir($dir))
				{
					print "<center><u>Ошибка:</u> указанной директории не существует!</center>";
				}
				else
				{
					if (ereg("[\/\:\*\?\"<>\|]", $fname))
					{
						print "<center><u>Внимание:</u> имя не должно содержать символов / \ : * ? \" <> | </center>";
					}
					else
					{
						if (!is_writable($dir))
						{
							print "<center><u>Ошибка:</u> невозможно создать файл в выбранной директории! Отсутствуют права доступа</center>";
						}
						else
						{
							if (file_exists("$dir/$fname"))
							{
								print "<center><u>Ошибка:</u> такой файл уже существует!</center>";
							}
							else
							{
							$ext = ereg_replace ("(.*)\.", "", $fname);
							if (in_array(strtolower($ext), $av_exts))
								{
								$fopen = fopen ("$dir/$fname", "w");
								fputs ($fopen, $content);
								fclose ($fopen);
								print "<center>Файл $dir/$fname успешно создан!</center>";
								}
								else
								{
								print "<center><u>Ошибка:</u> не удается создать выбранный файл, поскольку данный тип файла отсутствует в конфигурации скрипта</center>";
								}
							}
						}
					}
				}
			}
?>
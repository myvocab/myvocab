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
					print "<center><u>������:</u> ��������� �� ��� ���� �����!</center>";
			}
			else
			{
				if (!is_dir($dir))
				{
					print "<center><u>������:</u> ��������� ���������� �� ����������!</center>";
				}
				else
				{
					if (ereg("[\/\:\*\?\"<>\|]", $fname))
					{
						print "<center><u>��������:</u> ��� �� ������ ��������� �������� / \ : * ? \" <> | </center>";
					}
					else
					{
						if (!is_writable($dir))
						{
							print "<center><u>������:</u> ���������� ������� ���� � ��������� ����������! ����������� ����� �������</center>";
						}
						else
						{
							if (file_exists("$dir/$fname"))
							{
								print "<center><u>������:</u> ����� ���� ��� ����������!</center>";
							}
							else
							{
							$ext = ereg_replace ("(.*)\.", "", $fname);
							if (in_array(strtolower($ext), $av_exts))
								{
								$fopen = fopen ("$dir/$fname", "w");
								fputs ($fopen, $content);
								fclose ($fopen);
								print "<center>���� $dir/$fname ������� ������!</center>";
								}
								else
								{
								print "<center><u>������:</u> �� ������� ������� ��������� ����, ��������� ������ ��� ����� ����������� � ������������ �������</center>";
								}
							}
						}
					}
				}
			}
?>
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
			print "<form action=?do=listing&makedir&DIR=".@$_REQUEST['DIR']."&done method=post>��� ����� ����������: <input type=text name=dir_name> <input type=submit value=�������></form>";
			if (isset($_REQUEST['done']))
			{
				$dir = @$_REQUEST['DIR'];
				$dir_name = @$_REQUEST['dir_name'];
				if (is_dir($dir))
				{
					if (ereg("[\/\:\*\?\"<>\|]", $dir_name))
					{
						print "<center><u>��������:</u> ��� �� ������ ��������� �������� / \ : * ? \" <> | </center><br>";
					}	
					else
					{
						if (is_writable($dir))
						{
						 if (!is_dir("$dir/$dir_name")){
						mkdir("$dir/".trim($dir_name)."");
						print "<center>���������� $dir/$dir_name ������� �������!</center><br>";}
						else
							{print "<center><u>������:</u> ����� ���������� ��� ����������!</center><br>";}
						}
						else
						{
							print "<center><u>������:</u> ���������� ������� ����������! ����������� ����� �������</center><br>";
						}
					}
				}
				else
				{
					print "<center><u>������:</u> ���������� $dir �� �������!</center><br>";
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
				print "<center>�������� ���������� $unlink ������� ���������!</center><br>";
			}
			if (file_exists($unlink) and $deleted == false)
			{
				$get_dir = ereg_replace ("\/([^\/]*)([^\/]$)", "", $unlink);
				if (!is_writable($get_dir) or !is_writable($unlink))
				{
					print "<center><u>������:</u> ���������� ������� ��������� ����! ����������� ����� �������</center><br>";
				}else
				{
					unlink ($unlink);
					print "<center>�������� ����� $unlink ������� ���������!</center><br>";
				}
			}else if(!file_exists($unlink) and $deleted == false){
				print "<center><u>������:</u> ������ $unlink �� ������!</center><br>";
			}
		$dir = ereg_replace ("\/([^\/]*)([^\/]$)", "",$unlink);
		}
		if (isset($_REQUEST['rename']))
		{
		$rename = $_REQUEST['rename'];
		
        if (!file_exists($rename) and !is_dir($rename))
			{
			print "<center><u>������:</u> ������ $rename �� ������!</center><br>";
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
				{print "<center><u>��������:</u> ��� �� ������ ��������� �������� / \ : * ? \" <> | </center><br>";}
				else
				{
					rename ($_REQUEST['rename'], "$dir/".trim($_POST['new_name']));
					$rename = "$dir/".$_POST['new_name'];
					print "<center>��� �����/���������� $get_name ������� ��������</center><br>";
					$get_name = ereg_replace ("(.*)\/", "", $rename);
				}
							}
							else
				{
						print "<center><u>������:</u> ���������� ������������� ��������� ����/����������! ����������� ����� �������</center><br>";
				}
			}
			print "<form action=?do=listing&rename=$rename&done method=post>������� ����� ��� �����/����������: <input type=text name=new_name value=\"$get_name\"> <input type=submit value=�������������></form>";
					}
		}



        
          if (isset($_REQUEST['dwld']))
        {
        $dwld = $_REQUEST['dwld'];
       
        if (!file_exists($dwld) and !is_dir($dwld))
            {
            print "<center><u>������:</u> ������ $dwld �� ������!</center><br>";
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
var x = confirm(\"�� ������������� ������ ������� ������ \"+fid+\"?\");
if (x == true){
window.location=url;
}
}
</script>";
//      print    "<table width=95% align=center border=1><tr><td colspan=5><a href=?do=listing&DIR=$prev_dir title=\"Prev Directory\"><<<</a> <b>$dir</b></td></tr><tr><td><b>����/����������</b></td><td><b>������</b></td><td><b>�������</b></td><td><b>������</b></td><td><b>��������</b></td></tr>"; 
  
      print    "<table width=95% align=center border=1><tr><td></td></tr><tr><td><b>����� ��� ����������</b></td><td><b>������</b></td><td><b>�������</b></td><td><b>������</b></td><td><b>��������</b></td></tr>"; 

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
				print " ��</td><td><a href=\"?do=download&ddir=$dir&dfile=$file">[�������]</a> <a href=\"javascript:del_wind('?do=download&unlink=$dir/$file', '$file')\">[�������]</a>";
				if (filetype("$dir/$file") == "dir"){
				print " <a href=\"?do=listing&DIR=$dir/$file\">[�������]</a>";
				}
				print "</td></tr>";
			}
			print "</table>";
//print "<br><center><a href=?do=create&DIR=$dir>[������� ����]</a> <a href=?do=listing&makedir&DIR=$dir>[������� �����]</a></center>";
		}
		else if (!is_dir($dir)){print  $dir."<center>��������� ���������� s�� ����������</center>";}
?>
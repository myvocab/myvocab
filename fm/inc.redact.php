<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: inc.redact.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
if (!defined("main_file"))
{exit;}
if (!isset($_REQUEST['redact']))
{
			$dir = ereg_replace ("(\/+$)", "", $dir);
			$prev_dir = ereg_replace ("\/([^\/]*)([^\/]$)", "", $dir);
			print "<form action=?do=redact method=post>����������: <input type=text name=DIR value=\"$dir\" size=45><input type=submit value=�������></form>";
		if (is_dir($dir))
		{
			print "
			<script>
				function js_array (){
				alert('���� ������: ".trim(implode(" ", $av_exts))."');
			}
				</script>
			<a href=\"javascript:js_array()\">Show file array</a><br><br><table align=center border=1 width=95%><tr><td colspan=5><a href=?do=redact&DIR=$prev_dir title=\"Prev Directory\"><<<</a> <b>$dir</b></td></tr><tr><td><b>����</b></td><td><b>������</b></td><td><b>������</b></td><td><b>�������</b></td><td><b>��������</b></td></tr>";
		$handle = opendir ($dir);
		while ($file = readdir($handle))
			{
			if ($file == "." or $file == "..")
				{continue;}
			$ext = ereg_replace ("(.*)\.", "", $file);
				if (in_array(trim($ext), $av_exts) or filetype("$dir/$file") == "dir")
				{
					if (filetype("$dir/$file") == "file"){
					print "<tr><td>$file</td><td>".round(filesize("$dir/$file")/1024, 2)." ��</td><td>".date("d.m.Y", filectime("$dir/$file"))."</td><td>".date("d.m.Y", filemtime("$dir/$file"))."</td><td><a href=\"?do=redact&redact=$dir/$file\">[�������������]</a></td></tr>";
					}
					else{
					print "<tr><td>$file</td><td>n/a</td><td>n/a</td><td>n/a</td><td><a href=\"?do=redact&DIR=$dir/$file\">[�������]</a></td></tr>";
					}
				}
			}
			print "</table>";
		}else{
		print "<center>��������� ���������� �� ����������</center>";
		}
}
else
{
$redact = @$_REQUEST['redact'];
if (file_exists($redact))
{
if (isset($_REQUEST['done']))
{
	$get_dir = ereg_replace ("\/([^\/]*)([^\/]$)", "", $redact);
	$content = @$_POST['content'];
	if (is_writable($get_dir) and is_writable($redact))
	{
		$fopen = fopen ($redact, "w");
		if (@$_POST['stripslashes'] == "yes")
		{$content = stripslashes($content);}
		fputs ($fopen, $content);
		fclose ($fopen);
		print "<center>���� $redact ������� ��������������</center><br>";
	}

}
	print "<form action=?do=redact&redact=$redact&done method=post>�������:<br> <textarea name=content cols=56 rows=16>";
	$fopen = fopen ($redact, "r");
	$contents = fread ($fopen, filesize($redact));
	fclose ($fopen);
	print htmlspecialchars($contents);
	print "</textarea><br>�������� stripslashes() ?<input type=checkbox name=stripslashes value=yes CHECKED><br><input type=submit value=�������������></form>";
}
else
{
	print "<center><u>������:</u> ���� $redact �� ������!</center>";
}
}
?>
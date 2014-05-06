<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: functions.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
function get_size ($DIR, $cnt_size){
	$handle = opendir ($DIR);
	while ($file = readdir ($handle))
	{
		if ($file == "." or $file == "..")
		{continue;}
		if (filetype("$DIR/$file") == "file")
		{
			$cnt_size = $cnt_size + filesize("$DIR/$file");
		}
		else
		{$cnt_size = get_size("$DIR/$file", $cnt_size);}
	}
	closedir($handle);
return $cnt_size;
}
function del_dir ($DIR){
	$handle = opendir ($DIR);
	while ($file = readdir ($handle))
	{
		if ($file == "." or $file == "..")
		{continue;}
		if (filetype("$DIR/$file") == "file")
		{
			if (is_writable("$DIR/$file") and is_writable($DIR))
			{
				unlink ("$DIR/$file");
			}
			else
			{
				print "Невозможно удалить файл $DIR/$file! Отсутствуют права доступа";
			}
		}
		else
		{del_dir("$DIR/$file");}
	}
	closedir($handle);
	rmdir($DIR);
}
function search_file ($DIR, $QUERY){
	$handle = opendir ($DIR);
	while ($file = readdir ($handle))
	{
		if ($file == "." or $file == "..")
		{continue;}
		if (filetype("$DIR/$file") == "file")
		{
			if (ereg("\[\*\.(.*)\]", $QUERY))
			{
				$ext = ereg_replace ("\[\*\.(.+)\]", "\\1", $QUERY);
				if (ereg("[\/\:\*\?\"<>\|]", $ext))
				{die("<center>Произошла критическая ошибка (неверный синтаксис запроса)<br><br>");}
				if (ereg("(\.$ext$)", $file))
				{
				print "<tr><td>$file</td><td><a href=?do=listing&DIR=$DIR>$DIR</a></td></tr>";
				}
			}
			if (ereg("\[([0-9]+)->([0-9]+)\]", $QUERY))
			{
				$fsize = filesize ("$DIR/$file");
				$frsize = ereg_replace ("\[([0-9]+)->([0-9]+)\]", "\\1", $QUERY)*1024;
				$ltsize = ereg_replace ("\[([0-9]+)->([0-9]+)\]", "\\2", $QUERY)*1024;
				if ($fsize >= $frsize and $fsize <= $ltsize)
				{
				print "<tr><td>$file</td><td><a href=?do=listing&DIR=$DIR>$DIR</a></td></tr>";
				}
			}
			if (strpos(" $file", $QUERY))
			{print "<tr><td>$file</td><td><a href=?do=listing&DIR=$DIR>$DIR</a></td></tr>";}
		}
		else{search_file ("$DIR/$file", $QUERY);}
	}
}
?>
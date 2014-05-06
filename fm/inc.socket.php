<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: inc.socket.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
if (!defined("main_file"))
{exit;}
			$query_type = @$_POST['query_type'];
			$host = @$_POST['host'];
			$host = str_replace ("http://", "", $host);
			$ua = @$_POST['ua'];
			$ct = @$_POST['ct'];
			$cc = @$_POST['cc'];
			$cl = strlen ($cc);
			$s_open = fsockopen($host, 80);
			@$out .= "$query_type\r\n";
			$out .= "Host: $host\r\n";
			$out .= "User-Agent: $ua\r\n";
			$out .= "Content-Type: $ct\r\n";
			$out .= "Content-Length: $cl\r\n";
			$out .= "Connection: Close\r\n\r\n";
			$out .= $cc;
			fputs($s_open, $out);
			while(!feof($s_open)) echo (fgets($s_open,128));
			fclose($s_open);
?>
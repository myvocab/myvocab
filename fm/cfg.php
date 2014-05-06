<?
session_start();
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: cfg.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/
//$admin_password = "#like@des!"; //пароль для входа в систему
//$start_dir = $_SERVER['DOCUMENT_ROOT']; //стартовая директория (рекомендуется оставить без изменения)
//echo $_SESSION['user'];
$start_dir = "c:/kl/".trim($_SESSION['userName'])."/"; 
$start_dir_in = "c:/kl/".trim($_SESSION['userName'])."/in/"; 
$start_dir_in = "../fm/v2/"; 
//echo $start_dir_in;
$start_dir_out = "c:/kl/".trim($_SESSION['userName'])."/out/"; 
//$av_exts = array ("html", "htm", "php", "txt", "css", "cgi", "asp", "pl", "shtml", "phtml", "htaccess", "aspx"); //типы файлов, доступные для редактирования
$av_exts = array ("txt"); //типы файлов, доступные для редактирования
?>
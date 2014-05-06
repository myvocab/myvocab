<?
/********************************************/
/*Welcome to PHP File Manager source-code!*/
/*The PHP File Manager and its functions, contexture are copyrighted by s1ayer [www.spg.arbse.net]*/
/*Current file: index.php*/
/*Optimized for PHP 4.3.6, Apache 1.3.27*/
/********************************************/

session_start();
  if (!isset($_SESSION['userName']))
     {   
         header ("Location: ../index.php");
     exit();
     }

//echo "Request  ".$_REQUEST['do'];
//echo "Post  ".$_POST['do'];
//echo "GET  ".$_GET['do'];

/*if (!isset($_SESSION['user']))
     {   
         header ("Location: ../index.php");
     exit();
     }       */

$start_time = microtime();
$array_time = explode (" ", $start_time);
$start_time = $array_time[0]+$array_time[1];
include "cfg.php";
//echo $start_dir_in;
//echo $start_dir_out;

//include "functions.php";

if    (!isset($_COOKIE['admin']))
        {
            setcookie ("admin", md5($admin_password));
//            header ("Location: index.php");
//            exit;
        }
             
define ("main_file", true);

?>
<html><head><title><? echo $_SESSION['user'];?> - Работа с файлами </title>
<meta http-equiv="Content-Type" content="text/html; CHARSET=utf-8">
<style>
BODY {
    FONT-SIZE: 12pt; COLOR:black;  FONT-FAMILY: Verdana, Tahoma, Arial, Helvetica, sans-serif
}
A:link {
    FONT-WEIGHT: normal; FONT-SIZE: 12pt; COLOR:Royalblue; FONT-FAMILY: Verdana; TEXT-DECORATION: none 
}
A:active {
    FONT-WEIGHT: normal; FONT-SIZE: 12pt; FONT-FAMILY: Verdana; TEXT-DECORATION: none
}
A:visited {
    FONT-WEIGHT: normal; FONT-SIZE: 12pt; COLOR:Royalblue; FONT-FAMILY: Verdana; TEXT-DECORATION: none
}
A:hover {
    FONT-WEIGHT: normal; FONT-SIZE: 12pt; COLOR:black; FONT-FAMILY: Verdana; TEXT-DECORATION: underline
}
TD {
    FONT-SIZE: 12pt; COLOR:black;  FONT-FAMILY: Verdana, Tahoma, Arial, Helvetica, sans-serif
}
A.cr:visited {
    FONT-SIZE: 12pt; COLOR:gray;  FONT-FAMILY: Verdana, Tahoma, Arial, Helvetica, sans-serif; TEXT-DECORATION: underline
}
A.cr:link {
    FONT-SIZE: 12pt; COLOR:gray;  FONT-FAMILY: Verdana, Tahoma, Arial, Helvetica, sans-serif; TEXT-DECORATION: underline
}
</style>
</head><body>
<a href=?do=upload>Загрузить файл</a><br>
<a href=?do=download>Скачать файл</a><br>



<!--<a href=?do=find>Найти файл</a><br>
<u>/Редактирование текстовых файлов</u><br>
<a href=?do=create>Создать файл</a><br>
<a href=?do=redact>Редактировать файл</a><br>
<u>/Работа с сокетами</u><br>
<a href=?do=socket>Послать запрос</a><br>    -->
<?
if (isset($_REQUEST['do']))
{
    print "<hr width=90% color=black size=1>";
    SWITCH ($_REQUEST['do'])
    {
        CASE ("upload"):
//print "<form method=post enctype=\"multipart/form-data\" action=?do=upload&done><table><tr><td>Директория загрузки</td><td><input type=text name=DIR size=45 value=\"$start_dir\"></td></tr><tr><td>Файл</td><td><input type=file name=FILE size=45></td></tr></table><br><input type=submit value=Загрузить></form>";
print "<form method=post enctype=\"multipart/form-data\" action=?do=upload&done><table><tr><td></td><td></td></tr><tr><td>Файл</td><td><input type=file name=FILE size=45></td><td><input type=submit value=Загрузить size=45></td></tr></table></form>";

if (isset($_REQUEST['done']))
        {
    include "inc.upload.php";
        }

 //   $dir = @$_REQUEST['DIR'];
   $dir = $start_dir_in;
        if ($dir == "")
        {
            $dir = $start_dir_in;
        }
        
        $dir = ereg_replace ("(\/+$)", "", $dir);
 //           print "<form action=?do=listing method=post>Директория: <input type=text name=DIR value=\"$dir\" size=45><input type=submit value=Перейти></form>";
    include "inc.listing.upload.php";
        
            BREAK;
        
        
        
        CASE ("download"):
            $dir = @$_REQUEST['DIR'];
        if ($dir == "")
        {
            $dir = $start_dir_out;
        }
            $dir = ereg_replace ("(\/+$)", "", $dir);
    //        print "<form action=?do=listing method=post>Директория: <input type=text name=DIR value=\"$dir\" size=45><input type=submit value=Перейти></form>";
    include "inc.listing.download.php";
            BREAK;
        CASE ("find"):
        print "<form action=?do=find&done method=post>Введите запрос для поиска:* <input type=text name=filename> <input type=submit value=Искать></form><br>* можно вводить часть имени файла или его расширение (синт.: [*.расширение]) или диапозон размера в кб. (синт.: [от->до] , где 'от' и 'до' - числовые значения)";
        if (isset($_REQUEST['done']))
        {
            $fn = @$_POST['filename'];
            $dir = $_SERVER['DOCUMENT_ROOT'];
            if ($fn != ""){
            print "<br><br><table width=90% align=center border=1><tr><td><b>Файл</b></td><td><b>Ссылка</b></td></td>";
            search_file ($dir, $fn);
            print "</table>";
            }

        }
            
            
            BREAK;
        CASE ("create"):
            if (!isset($_REQUEST['DIR']))
        {$dir = $_SERVER['DOCUMENT_ROOT'];}
        else
        {$dir = $_REQUEST['DIR'];}
            print "<form action=?do=create&done method=post><table><tr><td>Введите имя файла (с расширением):</td> <td><input type=text name=fname size=40></td></tr><tr><td>Введите директорию:</td> <td><input type=text name=DIR size=40 value=\"$dir\"></td></tr><tr><td>Контент:</td><td><textarea name=content cols=56 rows=16></textarea></td></tr></table><input type=submit value=Создать></form>";
            if (isset($_REQUEST['done']))
        {
        include "inc.create.php";
        }
            BREAK;
        CASE ("redact"):
        $dir = @$_REQUEST['DIR'];
        if ($dir == "")
        {
            $dir = $start_dir;
        }
        include "inc.redact.php";
            BREAK;
        CASE ("socket"):
        print "<form action=?do=socket&connect method=post><table><tr><td>Query type: </td><td><input type=text name=query_type value=\"TYPE /PAGE HTTP/1.1\" size=40></td></tr><tr><td>Host: </td><td><input type=text name=host size=40></td></tr><tr><td>User-Agent: </td><td><input type=text name=ua size=40 value=\"".getenv("HTTP_USER_AGENT")."\"></td></tr><tr><td>Content-Type: </td><td><input type=text name=ct size=40></td></tr><tr><td>Query content: </td><td><input type=text name=cc size=40></td></tr></table><br><input type=submit value=Послать></form>";
        if (isset($_REQUEST['connect']))
        {
        include "inc.socket.php";
        }
            BREAK;
        DEFAULT:
            print "<center>Undefined function: ".$_REQUEST['do']."</center>";
            BREAK;
}
}
?>
<?
    $end_time = microtime();
    $array_time = explode (" ", $end_time);
    $end_time = $array_time[0]+$array_time[1];
//    print "<br><br><font size=-2><center>Execution Time: ".(round($end_time-$start_time, 4))." sec</font>";
***/
?>
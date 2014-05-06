<?php

session_start();

include("lib/connect_db.php");
$ip = $_SERVER['REMOTE_ADDR'];
$strSQL="INSERT INTO  stlog (ip, page ,dt) VALUES ('".$ip."',  'textchoice', CURRENT_TIMESTAMP)"; 
$result = mysqli_query($link, $strSQL);

/*
if ($_SESSION['userName'] == NULL) {
            $_SESSION['mess'] = "Неправильный пароль или логин</b><BR>";
              header("Location:index.php");
              exit();
}
*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/textchoice.js" type="text/javascript"></script>

<title>Выбор текста</title>
<?php

include('lib/menu.inc');
//header("Location:../textwords.php");
?>
<head>
    

<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    </head>
<script language="javascript" type="text/javascript">


function ChTx(ch) {
     alert(ch);
       // var url = "cgi-bin/fillTable.php?ch="+ch;
       // request.open("GET", url, true);
       // request.onreadystatechange = updatePageTo;
    //    request.send(null);
        }
</script>

<body>

<div align="center"><BR>
&nbsp;<a  href="mytexts.php" >
Мои тексты
</a><BR><BR>
&nbsp;<a  href="textadapt.php" >
Художественная литература (адаптированные тексты)
</a><BR><BR>


&nbsp;<a  href="textorig.php" >
Художественная литература (оригинальные тексты)
</a><BR><BR><BR>
<!--
&nbsp;
<a  href="textserials.php" >
Субтитры к сериалам
</a><BR><BR>

Субтитры к художественным фильмам
<BR><BR>
-->

<table class="frame_table" style=" left:0px;top:0px; border-style: solid; width:500px; height:130px;border-color: BLACK; "><tr><td colspan="2" align="center"><b>The World English Bible / БИБЛИЯ</b></td></tr>    
<tr><td align="center"><a  href="OldTestament.php" >Old Testament / Старый завет</a></td><td align="center"><a  href="NewTestament.php" >New Testament / Новый завет</a></td></tr>
<tr align="center"><td colspan="2" ><a  href="http://www.audiotreasure.com/webindex.htm" target="_blank">mp3 - файлы</a></td></tr> 
</table>



</div>
&nbsp;




</body>

 
</html>
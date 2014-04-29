<?php

session_start();

include("lib/connect_db.php");
$ip = $_SERVER['REMOTE_ADDR'];
$strSQL="INSERT INTO  stlog (ip, page ,dt) VALUES ('".$ip."',  'textAdpt', CURRENT_TIMESTAMP)"; 
$result = mysqli_query($link, $strSQL);

 
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


<body>



<table style="position:relative;left:5px;top:10px;background-color:#FFFFFF;width:780px;height:0px;z-index:0;border:1px BLACK solid;" cellpadding="0" cellspacing="0" id="tbn">
<tbody>    

<?php

$strSQL =   "SELECT books.* FROM books WHERE (((books.pr)=1)) ORDER BY books.pr, books.pr2, books.nameAuth, books.nameBook";
$res = mysqli_query($link, $strSQL); 
while ($row = mysqli_fetch_array($res))
{ 
$nameAuth =   Trim($row['nameAuth']);
$nameBook =   Trim($row['nameBook']);
 $nameFile  =  str_replace(' ', '_', $nameAuth)."-".str_replace(' ', '_', $nameBook).".rar";
// $nameFile = $nameAuth." - ".$nameBook.".rar";
//echo    $row['SortName']."</BR>";
echo "<tr>";
echo '<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:12px;">';
echo    $row['pr2Name'];
echo "</td>";
echo '<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">';
echo   $row['nameAuth']." - ".$row['nameBook'];
echo "</td>";
echo '<td style="border:1px solid grey;background:white;width:5px;">';
echo   '<input type="submit" id="ChTx101" onclick= "document.location.href =\'lib/compTextChoice.php?ch='.$row['idBook'].'\';" name="" value="Слова " >';
echo "</td>";
echo '<td style="border:1px solid grey;background:white;width:5px;">';
echo   '<input type="submit" id="ChTx101" onclick= "window.open(\'text.php?page=0&cBook='.$row['idBook'].'&ch=1\' , \'_blank\');" name="" value="Читать текст" >';
echo "</td>";

echo "</td>";
echo '<td style="border:1px solid grey;background:white;width:5px;">';
echo   '<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/'.$nameFile.'" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>';
echo "</td>";



echo "</tr>";


}





?>



</tbody>
</table>  

  
    </body>

 
</html>
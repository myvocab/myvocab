<?php

session_start();

include("lib/connect_db.php");
$ip = $_SERVER['REMOTE_ADDR'];
$strSQL="INSERT INTO  stlog (ip, page ,dt) VALUES ('".$ip."',  'textAdpt', CURRENT_TIMESTAMP)"; 
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



<table style="position:relative;left:5px;top:10px;background-color:#FFFFFF;width:780px;height:0px;z-index:0;border:1px BLACK solid;" cellpadding="0" cellspacing="0" id="tbn">
<tbody>    

<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
elementary         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
A Christmas Carol - Charles Dickens        
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=37';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=37&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/A_Christmas_Carol-Charles_Dickens.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>


<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
elementary         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
The Coldest Place On Earth - Tim Vicary       
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=38';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=38&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/The_Coldest_Place_On_Earth-Tim_Vicary.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>



<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
elementary         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
The Emperor - Frederick Forsyth        
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=39';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=39&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/The_Emperor-Frederick_Forsyth.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>



<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
elementary         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
The House On The Hill - Elizabeth       
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=40';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=40&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/The_House_On_The_Hill-Elizabeth_Laird.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>




<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
pre-intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
The Pearl - John Steinbeck         
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=2';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=2&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/The_Pearl-John_Steinbeck.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>





<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
The Grass Is Singing - Doris Lessing         
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=3';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=3&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/The_Grass_Is_Singing-Doris_Lessing.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>


<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
Live And Let Die - Ian Fleming         
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=4';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=4&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Live_And_Let_Die-Ian_Fleming.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>


<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
Far From The Madding Crowd - Thomas Hardy         
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=5';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=5&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Far_From_The_Madding_Crowd-Thomas_Hardy.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>








<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
Wuthering Heights - Emily Bronte       
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=7';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=7&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Wuthering_Heights-Emily_Bronte.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>


<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:12px;">
upper-intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
 Sons And Lovers - D H Lawrence        
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=6';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=6&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Sons_And_Lovers-D_H_Lawrence.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>



<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:12px;">
upper-intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
Tess Of Durberville - Thomas Hardy
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=8';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=8&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Tess_Of_Durberville-Thomas_Hardy.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>



<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:12px;">
upper-intermediate         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
All I Want - Margaret Johnson
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=9';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=9&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/All_I_Want-Margaret_Johnson.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>

</tr>



<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
advanced         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
  2001: A Space Odyssey - Arthur Clarke
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=10';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=10&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/2001_A_Space_Odyssey-Arthur_Clarke.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>
</tr>


<tr>
<td style="border:1px solid grey;background:white;width:110px;font-family:Arial;font-size:14px;">
advanced         
</td>
<td style="border:1px solid grey;background:white;width:500px;font-family:Arial;font-size:14px;">
  Benetton -  Jonathan Mantle 
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "document.location.href ='lib/compTextChoice.php?ch=11';" name="" value="Слова " >
</td>
<td style="border:1px solid grey;background:white;width:5px;">
<input type="submit" id="ChTx101" onclick= "window.open('text.php?page=0&cBook=11&ch=1' , '_blank');" name="" value="Читать текст" >
</td>
<td>
<font style="font-size:13px"  face="Arial"><a href="df.php?fd=myvocab.org/adpt/Benetton-Jonathan_Mantle.rar" > <font style="font-size:13px" face="Arial">&nbsp;скачать&nbsp; </font></a>
</td>
</tr>









<tr><td>  &nbsp;</td></tr>





</tbody>
</table>  

  
    </body>

 
</html>
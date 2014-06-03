<?php

session_start();
  
 
if ($_SESSION['userName'] == NULL) {
 	       $_SESSION['mess'] = '<font style="size:13px" color="#FF0000" face="Arial">
               Для использования этой формы необходимо зарегистрироваться.</font><br>';
              header("Location:index.php");
              exit();
}
$userId=$_SESSION['userId'];
$brow = $_SERVER['HTTP_USER_AGENT'];

 $browsers = array ("MSIE", "Firefox","Presto","Chrome", "Safari");

for($i = 0; $i < count($browsers); $i++) {
     if(strpos($brow,$browsers[$i])) {
       $br = $browsers[$i];
       break;
     }
 } 
include("lib/connect_db.php");
$nameBook= "MyVocab";
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<link href="css/vocab.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/vocab.js" type="text/javascript"></script>
<script src="js/setvocab.js" type="text/javascript"></script>
<script src="js/shared.js" type="text/javascript"></script>
<title>Мои слова<?php echo "-".$nameBook; ?></title>
<?php

include('lib/menu.inc');
//header("Location:../textwords.php");
?>
<head>
	

<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	</head>
	
<!--	<body id="body_words" onLoad="fillTable('start')"; onUnLoad="check_exit()";> -->
  
<body id="body_words" onLoad="fillTable('start'); dateNow();" >
<div style="margin:0;padding:0;position:absolute;left:0px;top:0px;">  
<audio id='mySoundClip'><source src=""></source></audio>
 
<!-- service info and button-->

<div style="position:absolute;left:0px; top:520px; display: none;"> 

<input type="text" id="FCurrN" name="" value="">
<input type="text" id="numberInTable" name="NInT" value="">
<div  class="capt" style="left:430px;top:48px;width:50px;text-align:left;">Новые</div>
<input type="text" id="NR0" style="position:absolute;left:480px;top:46px;width:50px;height:15px;text-align:right;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:6" name="NR0" value="" readonly="readonly">
<input type="checkbox" onclick="fillTable('d0',this.checked);" id="Done0" name="" value="on" checked style="position:absolute;left:550px;top:46px;z-index:0">



<div  class="capt" style="left:420px;top:126px;width:150px;">Показать удаленные</div>
<input type="text" id="NRDel" style="position:absolute;left:500px;top:128px;width:50px;height:15px;text-align:right;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:8; display: none" name="Editbox4" value="" readonly>
<input type="checkbox" onclick="fillTable('fdel',this.checked);" id="flagdel" name="" value="on" style="position:absolute;left:550px;top:124px;z-index:0">


<input class="bt" type="submit" id="PrevPage" onclick="fillTable('PrevPage');" name="" value="<<--" style="left:4px;top:273px;width:62px;" >
<input class="bt" type="submit" id="NextPage" onclick="fillTable('NextPage');" name="" value="-->>" style="left:67px;top:273px;width:62px;">


</div>





<div  style="position:absolute;left:0px;top:390px; display:block;">
<div  id="changeForAll"style="position:absolute;left:0px;top:20px; display:<?php if ($_SESSION['userId']==3){echo  'block';} else {echo  'none';}?>;">  
<input class="bt" type="submit" id="ttt"  name="" value="nnn" style="left:145px;top:0px;">
<input class="bt" type="submit" id="btDelA" onclick="delRestore(-1,'all');" name="" value="Удалить для всех" style="left:145px;top:0px;">
<input class="bt" type="submit" id="btRestoreA" onclick="delRestore(1,'all');" name="" value="Востановить для всех" 
style="left:290px;top:0px;">
<input class="bt" type="submit" id="SaveEditA" onclick="saveEdit('all');" name="" value="Сохранить для всех" 
style="left:0px;top:0px;">




</div>
</div>

<div  id="forDrbug" style="position:absolute;left:0px;top:0px; display:none;">  
<input type="text" id="tmp1" style="position:absolute;left:2px;top:420px;width:928px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="sWord" value="" >
<input type="text" id="tmp2" style="position:absolute;left:2px;top:440px;width:928px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="sWord" value="" >
</div>





<!-- left block button -->

<table class="frame_table" style="left:2px; top:25px; width:130px; height:165px;"><tr><td></td></tr></table>
<div  class="capt" style="left:5px;top:30px;width:122px;font-family:Tahoma;"> ОТМЕТИТЬ КАК:</div>
<input class="bt" type="submit" id="bt50" onclick="setLevel(50);" name="" value="Изучаемое с датой" style="left:5px;top:51px;">
<input id="dLevel" name="level_date"  onfocus="keydownuse=0;" onblur="keydownuse=1;" onchange="calcLevVocab()" value="" style="position:absolute; left:7px; top:82px; width:64px; height:11px; color:#707070; font-size:12px" title="Дата">
<input id="NWDLevel" name="NWDLevel_n" value="0" style="position:absolute; left:80px; top:82px; width:40px; height:11px; font-size:12px;text-align:right" title="Колл.изучаемых слов" readonly>
<input class="bt" type="submit" id="bt100" onclick="deActBt();setLevel(100);" name="" value="Выученное" style="left:5px;top:115px;">
<input class="bt" type="submit" id="bt0" onclick="setLevel(0);" name="" value="Не изучаемое" style="left:5px;top:153px;">

<input class="bt" type="submit" id="btDel" onclick="delRestore(-1);" name="" value="Удалить" style="left:5px;top:200px;">

 


<input class="bt" type="submit" id="PrevWord" onclick="if(chKey==0){chKey=1;showWord(rIndex);}" name="" value="<--" style="left:4px;top:235px;width:62px;">
<input class="bt" type="submit" id="NextWord" onclick="if(chKey==0){chKey=1;showWord(rIndex+2);}" name="" value="-->" style="left:67px;top:235px; width:62px;">
 
 

<input class="bt" type="submit" id="cWH" onclick="<?php if ($br !="Presto") {echo 'clExemWindowsH();';} ?>
wordHistory();" name="" value="К СЛОВУ В ТЕКСТЕ" style="left:5px;top:270px;">

<input  type="text" id="oriWord" style="position:absolute;left:7px;top:337px;width:115px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;text-align:center;font-weight: bold;z-index:0;display: none;" name="oriWord" value="" disabled="">

<input class="bt" type="submit" id="BSetBookmark" onclick="setBookmark();" name="" value="Установить закладку1" style="left:5px; top:315px;">
<input class="bt" type="submit" id="toBookmark" onclick="fillTable('bookmark');" name="" value="Перейти к закладке1" style="left:5px; top:345px;">

    


<!-- right block button -->

<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en')" name="" value="MP3-en" 
style="left:443px;top:25px;width:40px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en-ru');" name="" value="en-ru" 
style="left:483px;top:25px;width:40px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en-sp-ru');" name="" value="en-sp-ru" 
style="left:523px;top:25px;width:42px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('all');" name="" value="All" 
style="left:565px;top:25px;width:32px;">





<div  style="position:absolute;left:20px;top:25px; display:block;">
<table class="frame_table" style="left:427px; top:30px; width:145px; height:80px;"><tr><td></td></tr></table>
<div  class="capt" style="left:450px;top:30px;width:200px;font-size:12px;font-family:Tahoma;text-align:left;">Колл-во слов</div>
<div  class="capt" style="left:520px;top:30px;width:50px;font-size:12px;font-family:Tahoma;text-align:right;">пок-ть</div>

<div  class="capt" style="left:430px;top:53px;width:50px;text-align:left;">Изучаем.</div>
<div  class="capt" style="left:430px;top:80px;width:50px;text-align:left;">Выучен.</div>


<input type="text" id="NR50" style="position:absolute;left:480px;top:53px;width:50px;height:15px;text-align:right;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:7" name="NR50" value="" readonly="readonly">
<input type="text" id="NR100" style="position:absolute;left:480px;top:78px;width:50px;height:15px;text-align:right;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:8" name="Editbox3" value="" readonly="readonly">

<input type="checkbox" onclick="fillTable('d50',this.checked);" id="Done50" name="" value="on" style="position:absolute;left:550px;top:51px;z-index:0">
<input type="checkbox" onclick="fillTable('d100',this.checked);" id="Done100" name="" value="on" style="position:absolute;left:550px;top:78px;z-index:0">
</div>





<div  style="position:absolute;left:20px;top:45px; display:block;">
<table class="frame_table" style="left:427px; top:100px; width:145px; height:148px;"><tr><td></td></tr></table>
<input class="bt_l" type="submit" id="btStudy" onclick="compLearnVocab();<?php if ($br !="Presto") {echo 'clExemWindowsL();';} ?>wordsLearn('v');" name="" value="Повторение слов" style="left:432px;top:105px; ">
<div  class="capt" style="left:430px;top:131px;width:10px;font-size:13px;">с</div>



<input id="nSt" name="nSt"  value="1" style="position:absolute;left:443px; top:131px; width:33px; height:11px; color:#707070; font-size:12px;text-align:right;" >

<div  class="capt" style="left:485px;top:131px;width:10px;font-size:13px;">по</div>

<input id="nFn" name="nFn"  value="25" style="position:absolute;left:508px; top:131px; width:33px; height:11px; color:#707070; font-size:12px;text-align:right;"  >
<input type="checkbox" onclick="if(this.checked==1){document.getElementById('flp').checked=0;};if(this.checked==0){document.getElementById('flp').checked=1;} setCheckLearn();" id="flr" name="" value="on" style="position:absolute;left:550px;top:131px;z-index:0">
<div  class="capt" style="left:430px;top:148px;width:140px;font-size:13px;">------------------------------</div>
<div  class="capt" style="left:455px;top:161px;width:80px;font-size:13px;">за период:</div>
<input type="checkbox" onclick="if(this.checked==1){document.getElementById('flr').checked=0;};if(this.checked==0){document.getElementById('flr').checked=1;}; setCheckLearn();" id="flp" name="" value="on" style="position:absolute;left:550px;top:186px;z-index:0">



<div  class="capt" style="left:435px;top:178px;width:5px;font-size:13px;">с</div>
<input id="dateS" name="dSt"  value="<? echo date("Y.m.d", mktime(0,0,0));?>" style="position:absolute; left:454px; top:178px; width:85px; height:11px; color:#707070; font-size:12px;text-align:right;" >

<div  class="capt" style="left:435px;top:195px;width:5px;font-size:13px;">по</div>
<input id="dateE" name="dEnd"  value="<? echo date("Y.m.d", mktime(0,0,0));?>" style="position:absolute; left:454px; top:195px; width:85px; height:11px; color:#707070; font-size:12px;text-align:right;" >


<input class="bt_l" type="submit" id="btStudy" onclick="<?php if ($br !="Presto") {echo 'clExemWindowsL();';} ?>wordsLearn('v');" name="" value="Продолжить повторение" style="left:432px;top:220px; ">
</div>



<div  style="position:absolute;left:445px;top:90px; display:block;">
<table class="frame_table" style="left:2px; top:215px; width:145px; height:65px;"><tr><td></td></tr></table>

<input class="bt_l" type="submit" id="sW" onclick="document.getElementById('oriWord').value = document.getElementById('sWord').value; fillTable('findword');" name="" value="НАЙТИ СЛОВО" style="left:5px;top:220px;">
<input type="text" id="sWord"  onfocus="keydownuse=2;" onblur="keydownuse=1;" style="position:absolute;left:7px;top:255px;width:130px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;text-align:left;font-weight: bold;z-index:0" name="sWordn" value="" >
</div>







<div  style="position:absolute;left:15px;top:150px;display:<?php if ($_SESSION['userId']==3){echo  'none';} else {echo  'none';}?>;">
<table class="frame_table" style="left:427px; top:257px; width:145px; height:80px;"><tr><td></td></tr></table>
<input class="bt_l" type="submit" id="btStudy" onclick="compLearn(); <?php if ($br !="Presto") {echo 'clExemWindowsL();';} ?>wordsLearn('s');" name="" value="Повторение по схеме" style="left:432px;top:262px; ">
<div  class="capt" style="left:430px;top:286px;width:60px;font-size:13px;">на дату</div>

<input id="dStudy" name="dStudy" onchange="setLearnDate();" value="<? echo date("Y.m.d", mktime(0,0,0));?>" style="position:absolute; left:495px; top:286px; width:65px; height:11px; color:#707070; font-size:12px;text-align:right;" title="Date">
<input class="bt_l" type="submit" id="btStudy" onclick="<?php if ($br !="Presto") {echo 'clExemWindowsL();';} ?>wordsLearn('s');" name="" value="Продолжить повторение" style="left:432px;top:310px; ">
</div>






<!--End  right block button -->



<!-- Info current word -->
<input class="bt" type="image" src="/img/sound.png" id="bt50" onclick="madesound();" name="" value="Звук" style="left:416px;top:25px;width:22px;height:22px;">
<form method="post" name="WordForm" action="" style="position:absolute;left:-440px;top:5px;">
<input type="text" id="WordEdit" onfocus="keydownuse=3;" onblur="keydownuse=1;" onchange="seekTrans(this.value)" style="position:absolute;text-align:center;left:575px;top:20px;width:277px;height:22px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:15px;font-weight:bold;z-index:2" name="WEdit" value="">
<input type="text" id="trnsc" onfocus="keydownuse=4;" onblur="keydownuse=1;" style="position:absolute;text-align:left;left:575px;top:42px;width:300px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="trnsc" value="">
<input type="text" id="WordTrs"  style="position:absolute;text-align:left;left:575px;top:64px;width:300px;height:20px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:14px;font-weight:bold;z-index:2" name="WEdit" value="">

<textarea name="TextAreaTranslate" id="TextAreaTranslate" onfocus="keydownuse=0;" onblur="keydownuse=1;" style="position:absolute;left:575px;top:85px;width:300px;height:280px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:1" rows="35" cols="56" ></textarea>




</form>



<!--End Info current word -->
<input class="bt" type="submit" id="SaveEdit" onclick="saveEdit();" name="" value="Сохранить изменения" style="left:135px;top:375px;width:300px;">



<table class="main_table" id="tbn">


<!--<caption>This is a table caption</caption>-->
<tbody>      
<script language="javascript" type="text/javascript">  
for (var i = 1; i <= NumberWords; i++) {
//document.write('<tr   id="td1" onclick="showWord('+ i +' );"  onmouseover="overm(this);" onmouseout="outm(this);" >');
document.write('<tr   id="td1" onclick="showWord('+ i +' );"  onmouseover="overm(this);" onmouseout="outm(this);" >');


document.write('<td class="td_NT" id="np'  + i + '"<td>');
document.write('<td class="td_date" id="date'+ i + '"</td>');
document.write('<td class="td_word" id="tc'  + i + '"</td>');
document.write('<td class="td_idS" id="iterationO' + i + '"</td>');
document.write('<td class="td_iteration" id="iteration'  + i + '"</td>');

document.write('</tr>');
//alert(i) ;
}

//i=0;
//window.document.WordForm.TextAreaTranslate.value = idSortArray;
</script>
<tr><td colspan="5" style="border-width:3px;">
<table style="width: 250px;height:20px; "><tr>
<td id="FirstIcon" style="position:absolute; left:0px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillTable('FirstPage');" class="item"><img class="icon" src="./img/b_firstpage.png" width="16" height="16"  alt="first page" /></td>
<td id="PrevIcon" style="position:absolute; left:40px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillTable('PrevPage');" class="item"><img class="icon" src="./img/b_prevpage.png"  width="16" height="16" alt="prev.page" /></td>
<td id="CurrRow" style="position:absolute; left:80px; width: 40px; height:15px;text-align: center; border-width : 1px;"></td>
<td id="NumberRow" style="position:absolute; left:125px; width: 40px; height:15px;text-align: center; border-width : 1px;"></td>
<td id="NextIcon" style="position:absolute; left:170px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillTable('NextPage');"  class="item"><img class="icon" src="./img/b_nextpage.png" width="16" height="16"  alt="next page" /></td>
<td id="LastIcon" style="position:absolute; left:210px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillTable('LastPage');" class="item"><img  class="icon" src="./img/b_lastpage.png" width="16" height="16" alt="last page" /></td>
</tr>
</table>
</table>

</td></tr>
</tbody>
</table >
</div>
	</body>

 
</html>

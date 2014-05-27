<?php
session_start();
if ($_SESSION['userName'] == NULL) {
 	       $_SESSION['mess'] = "Для использования этой формы необходимо зарегистрироваться</b><BR>";
              header("Location:index.php");
              exit();
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/learnwords.js" type="text/javascript"></script>
<script src="js/setfunctLearn.js" type="text/javascript"></script>

<title><?php echo $_GET["dlearn"]; ?> Повторение слов </title>
<!-- <link href="css/windows.css" rel="stylesheet" type="text/css" />  -->
<link href="css/learnwords.css" rel="stylesheet" type="text/css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<?php

//include('lib/menu.inc');

?>
<head>
	

<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	</head>
<body id="body_words" onLoad="fillLearn('start', '<?php echo $_GET["ch"]; ?>'); dateNow();">

<audio id='mySoundClip'><source src=""></source></audio>
 
<input  id="PrevPage"  style="display:none;">
<input  id="NextPage"  style="display:none;">   
<div  style="position:absolute;left:0px;top:0px; display:block">
<div  id="changeForAll"style="position:absolute;left:0px;top:384px; display:<?php if ($_SESSION['userId']==3){echo  'block';} else {echo  'none';}?>;">  
<input class="bt" type="submit" id="SaveEditA" onclick="saveEdit('all');" name="" value="Сохранить для всех" 
style="left:140px;top:0px;">
<input class="bt" type="submit" id="btDelA" onclick="delRestore(-1,'all');" name="" value="Удалить для всех" style="left:280px;top:0px;">
</div>
</div>

<div style="margin:0;padding:0;position:absolute;left:0px;top:-10px; display:none;">   
<input type="text" id="FCurrN" style="position:absolute; left:0px; top:392px;width:40px;display:block" name="" value="">
<input type="text" id="numberInTable" style="position:absolute;left:0px;top:410px;width:40px;height:19px;display:block" name="numberInTable" value="numberInTable">
<input type="text" id="numberInTablePrev" style="position:absolute;left:50px;top:410px;width:40px;height:19px;display:block" name="numberInTablePrev" value="0">
<input type="text" id="oriWord" style="position:absolute;left:0px;top:430px;width:100px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="oriWord" value="">
</div>

<div  id="forDebug"style="position:absolute;left:0px;top:0px; display:<?php if ($_SESSION['userId']==3){echo  'none';} else {echo  'none';}?>;">  
<input type="text" id="chLearn" style="position:absolute;left:2px;top:400px;width:10px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="chval" value="<?php echo $_GET["ch"]; ?>" >
<input type="text" id="tmp1" style="position:absolute;left:2px;top:420px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp1" value="" >
<input type="text" id="tmp2" style="position:absolute;left:2px;top:440px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp2" value="" >
<input type="text" id="tmp3" style="position:absolute;left:2px;top:460px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp3" value="" >
</div>



</div>
<!-- left block button -->

<input class="bt" type="submit" id="memWord" onclick="memWord(rIndex+1);document.getElementById('TextAreaTranslate').focus();" name="" value="Знаю слово" style="left:4px; top:10px;">
<input class="bt" type="submit" id="btStudy" onclick="document.getElementById('TextAreaTranslate').style.display='block';" name="" value="Перевод" style="left:4px;top:44px; width:62px; ">

<input class="bt" type="submit" id="NextWord" onclick="if(chKey==0){chKey=1;showWord(rIndex+2);};document.getElementById('tc').focus();" name="" value="--->" style="left:67px;top:44px; width:62px;">
<input class="bt" type="submit" id="PrevWord" onclick="if(chKey==0){chKey=1;showWord(rIndex);}" name="" value="<---" style="left:67px;top:74px;width:62px;">

<input class="bt" type="submit" id="btStudy" onclick="document.getElementById('TextAreaTranslate').style.display='none';" name="" value="Скрыть" style="left:4px;top:74px; width:62px; ">


<div  style="position:absolute;left:0px;top:10px;">
<table class="frame_table" style="left:2px; top:100px; width:130px; height:120px;"><tr><td></td></tr></table>
<div  class="capt" style="left:4px; top:105px; width:122px;"> ОТМЕТИТЬ КАК:</div>
<input class="bt" type="submit" id="bt50" onclick="setLevel(50);" name="" value="Изучаемое с датой" style="left:4px;top:118px;width:122px;">
<input id="dLevel" name="level_date" onfocus="keydownuse=2;" onblur="keydownuse=1;" onchange="calcLev()" value="" style="position:absolute; left:6px; top:145px; width:64px; height:11px; color:#707070; font-size:12px" title="Date">
<input id="NWDLevel" name="NWDLevel_n" value="0" style="position:absolute; left:79px; top:145px; width:40px; height:11px; font-size:12px;text-align:right" title="Колл.изучаемых слов" readonly>
<input class="bt" type="submit" id="bt100" onclick="setLevel(100);" name="" value="Выученные" style="left:4px;top:166px;width:122px;">
<input class="bt" type="submit" id="bt0" onclick="setLevel(0);" name="" value="Не изучаемое" style="left:4px;top:191px;width:122px;">

</div>

<input class="bt" type="submit" id="btDel" onclick="delRestore(-1);" name="" value="Удалить" style="left:4px;top:243px;">

<input class="bt" type="submit" id="randWords" onclick="document.location.href = 'lib/randLearn.php?chval=<?php echo $_GET["ch"]; ?>';" name="" value="Поменять порядок сл" style="left:4px; top:273px;">


<table class="frame_table" style="left:2px; top:305px; width:130px; height:50px;"><tr><td></td></tr></table>
<div class="capt" style="left:0px; top:310px; width:135px;font-size:10px">ПРИ СМЕНЕ СЛОВА:</div>
<div class="capt" style="left:10px; top:323px; width:100px;font-size:10px">скрывать перевод</div>
<input type="checkbox" id="DisplayTr" name="" value="on" checked style="position:absolute;left:105px;top:319px;z-index:0">

<div class="capt" style="left:10px; top:338px; width:100px;font-size:10px">произносить слово</div>
<input type="checkbox" id="SWord" name="" value="off" onchange="if (document.getElementById('SWord').checked){madesound();}" style="position:absolute;left:105px;top:335px;z-index:0">


<input class="bt" type="submit" id="cWH" onclick="<?php if ($br !="Presto") {echo 'clExemWindowsH();';} ?>
wordHistory();" name="" value="К СЛОВУ В ТЕКСТЕ" style="left:4px;top:358px;">






<!-- End left block button -->    


<!-- right block button -->



<!--End  right block button -->
<input class="bt" type="image" src="/img/sound.png" id="bt50" onclick="madesound();" name="" value="Звук" style="left:420px;top:10px;width:22px;height:22px;">
<div id="InfoWord" style="position:absolute; left:140px; top:10px;">
<form method="post" name="WordForm" action="">
<input type="text" id="WordEdit" onfocus="keydownuse=0;" onblur="keydownuse=1;" onchange="seekTrans(this.value)" style="position:absolute;text-align:center;left:0px;top:0px;width:277px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:15px;font-weight:bold;z-index:2" name="WEdit" value="">


<input type="text" id="trnsc" onfocus="keydownuse=0;" onblur="keydownuse=1;" style="position:absolute;text-align:left;left:0px;top:22px;width:300px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="trnsc" value="">
<textarea name="TextAreaTranslate" id="TextAreaTranslate" onfocus="keydownuse=0;" onblur="keydownuse=1;" style="position:absolute;left:0px;top:43px;width:300px;height:300px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:0" rows="35" cols="56" ></textarea>
</form>
<input class="bt" type="submit" id="SaveEdit" onclick="saveEdit();" name="" value="Сохранить изменения" style="left:0px;top:348px;width:302px;">

</div>


<table class="main_table" id="tbn">


<!--<caption>This is a table caption</caption>-->
<tbody>      
<script language="javascript" type="text/javascript">  
for (var i = 1; i <= NumberWords; i++) {
//memWord();document.write('<tr   id="td1" onclick="showWord('+ i +' );"  onmouseover="overm(this);" onmouseout="outm(this);" >');
document.write('<tr   id="td'+ i +'" onclick="showWord('+ i +' );"   >');

document.write('<td class="td_idS" id="idS' + i + '"></td>');
document.write('<td class="td_date"  id="date'+ i + '"></td>');
document.write('<td class="td_word"  id="tc'  + i + '"></td>');

document.write('</tr>');
}

//i=0;
//window.document.WordForm.TextAreaTranslate.value = idSortArray;
</script>
<tr><td colspan="4" style="border-width:3px; background-color: white;">
<table style="width: 250px;height:20px; "><tr>
<td id="FirstIcon" style="position:absolute; left:0px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillLearn('FirstPage','<?php echo $_GET["ch"]; ?>');" class="item"><img class="icon" src="./img/b_firstpage.png" width="16" height="16"  alt="first page" /></td>
<td id="PrevIcon" style="position:absolute; left:40px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillLearn('PrevPage','<?php echo $_GET["ch"]; ?>');" class="item"><img class="icon" src="./img/b_prevpage.png"  width="16" height="16" alt="prev.page" /></td>
<td id="CurrRow" style="position:absolute; left:80px; width: 40px; height:15px;text-align: center; border-width : 1px;"></td>
<td id="NumberRow" style="position:absolute; left:125px; width: 40px; height:15px;text-align: center; border-width : 1px;"></td>
<td id="NextIcon" style="position:absolute; left:170px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillLearn('NextPage','<?php echo $_GET["ch"]; ?>');"  class="item"><img class="icon" src="./img/b_nextpage.png" width="16" height="16"  alt="next page" /></td>
<td id="LastIcon" style="position:absolute; left:210px; width: 40px; height:10px;text-align:center;  border: none;"><a href="#" onclick="fillLearn('LastPage','<?php echo $_GET["ch"]; ?>');" class="item"><img  class="icon" src="./img/b_lastpage.png" width="16" height="16" alt="last page" /></td>
</tr>
</table>
</table>

</td></tr>
</tbody>
</table >
 </div>
	</body>

 
</html>

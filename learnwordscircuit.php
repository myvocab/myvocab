<?php
session_start();
if ($_SESSION['userName'] == NULL) {
 	      $_SESSION['mess'] = '<font style="size:13px" color="#FF0000" face="Arial">
               Для использования этой формы необходимо зарегистрироваться.</font><br>';
              header("Location:index.php");
              exit();
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/learnwordscircuit.js" type="text/javascript"></script>
<script src="js/setfunctLearnCircuit.js" type="text/javascript"></script>
<script src="js/shared.js" type="text/javascript"></script>

<title><?php echo $_GET["dlearn"]; ?> Повторение слов </title>
<!-- <link href="css/windows.css" rel="stylesheet" type="text/css" />  -->
<link href="css/learnwordscircuit.css" rel="stylesheet" type="text/css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>


<?php

include('lib/menu.inc');

?>
<head>
	

<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	</head>
<body id="body_words" onLoad="fillLearn('start', '<?php echo $_GET["ch"]; ?>'); dateNow();">

<audio id='mySoundClip'><source src=""></source></audio>
 
  
<div  style="position:absolute;left:0px;top:0px; display:block">
<div  id="changeForAll"style="position:absolute;left:0px;top:394px; display:<?php if ($_SESSION['userId']==3){echo  'block';} else {echo  'none';}?>;">  
<input class="bt" type="submit" id="SaveEditA" onclick="saveEdit('all');" name="" value="Сохранить для всех" 
style="left:40px;top:0px;">
<input class="bt" type="submit" id="btDelA" onclick="delRestore(-1,'all');" name="" value="Удалить для всех" style="left:180px;top:0px;">



<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('-sp-ru');" name="" value="en-sp-ru" 
style="left:550px;top:0px;width:60px;">
<input class="bt" type="submit" id="SaveEditA" onclick="" name="" value="en" 
style="left:630px;top:0px;width:60px;">
<input class="bt" type="submit" id="SaveEditA" onclick="madesound();" name="" value="en-ru" 
style="left:700px;top:0px;width:60px;">

</div>
</div>

<div style="margin:0;padding:0;position:absolute;left:0px;top:-10px; display:none;">   

<input type="text" id="numberInTable" style="position:absolute;left:0px;top:410px;width:40px;height:19px;display:block" name="numberInTable" value="numberInTable">

<input type="text" id="oriWord" style="position:absolute;left:0px;top:430px;width:100px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="oriWord" value="">
</div>

<div  id="forDebug"style="position:absolute;left:0px;top:0px; display:<?php if ($_SESSION['userId']==3){echo  'none';} else {echo  'none';}?>;">  
<input type="text" id="chLearn" style="position:absolute;left:2px;top:400px;width:10px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="chval" value="<?php echo $_GET["ch"]; ?>" >
<input type="text" id="tmp1" style="position:absolute;left:2px;top:420px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp1" value="" >
<input type="text" id="tmp2" style="position:absolute;left:2px;top:440px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp2" value="" >
<input type="text" id="tmp3" style="position:absolute;left:2px;top:460px;width:1000px;height:13px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:9px;text-align:left;font-weight: bold;z-index:0" name="tmp3" value="" >
</div>




<!-- left block button -->
<div style="position:absolute;left:0px;top:15px;">
<input class="bt" type="submit" id="memWord" onclick="memWordSt(1);" name="" value="ЗНАЮ" style="left:4px; top:10px; height:25px;">
<input class="bt" type="submit" id="memWord" onclick="memWordSt(-1);" name="" value="Не знаю" style="left:4px; top:45px; height:25px;">

<input class="bt" type="submit" id="btStudy" onclick="document.getElementById('trnsl').style.display='block';" name="" value="Показать перевод" style="left:4px;top:85px; height:25px; ">

<input class="bt" type="submit" id="btStudy" onclick="document.getElementById('trnsl').style.display='none';" name="" value="Скрыть перевод" style="left:4px;top:120px; height:25px; ">



<table class="frame_table" style="left:2px; top:155px; width:130px; height:55px;"><tr><td></td></tr></table>
<div class="capt" style="left:0px; top:160px; width:135px;font-size:10px">ПРИ СМЕНЕ СЛОВА:</div>
<div class="capt" style="left:10px; top:175px; width:100px;font-size:10px">скрывать перевод</div>
<input type="checkbox" id="DisplayTr" name="" value="on" checked style="position:absolute;left:105px;top:172px;z-index:0">
<div class="capt" style="left:10px; top:190px; width:100px;font-size:10px">произносить слово</div>
<input type="checkbox" id="SWord" name="" value="off" onchange="if (document.getElementById('SWord').checked){madesound();}" style="position:absolute;left:105px;top:187px;z-index:0">



<div  style="position:absolute;left:0px;top:130px;">
<table class="frame_table" style="left:2px; top:100px; width:130px; height:90px;"><tr><td></td></tr></table>
<div  class="capt" style="left:4px; top:105px; width:122px;"> ОТМЕТИТЬ КАК:</div>

<input class="bt" type="submit" id="bt100" onclick="setLevel(100);" name="" value="Выученные" style="left:4px;top:122px;width:122px; height:25px;">
<input class="bt" type="submit" id="bt0" onclick="setLevel(0);" name="" value="Не изучаемое" style="left:4px;top:155px;width:122px; height:25px;">

<input class="bt" type="submit" id="cWH" onclick="<?php if ($br !="Presto") {echo 'clExemWindowsH();';} ?>
wordHistory();" name="" value="К СЛОВУ В ТЕКСТЕ" style="left:4px;top:200px; height: 25px;">

</div>

<!-- End left block button -->    


<!-- right block button -->



<!--End  right block button -->
<input class="bt" type="image" src="/img/sound.png" id="bt50" onclick="madesound();" name="" value="Звук" style="left:424px;top:10px;width:22px;height:22px;">
<div id="InfoWord" style="position:absolute; left:143px; top:10px;">
<form method="post" name="WordForm" action="">
<input type="text" id="WordEdit" onfocus="keydownuse=0;" onblur="keydownuse=1;" onchange="seekTrans(this.value)" style="position:absolute;text-align:center;left:0px;top:0px;width:277px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:15px;font-weight:bold;z-index:2" name="WEdit" value="">

<input type="text" id="trnsc" onfocus="keydownuse=0;" onblur="keydownuse=1;" style="position:absolute;text-align:left;left:0px;top:22px;width:300px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="trnsc" value="">
<input type="text" id="WordTrs"  style="position:absolute;text-align:left;left:0px;top:45px;width:300px;height:19px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:15px;font-weight:bold;z-index:2" name="WordTrs" value="">

<textarea  id="trnsl"   name="TextAreaTranslate" onfocus="keydownuse=0;" onblur="keydownuse=1;" style="position:absolute;left:0px;top:64px;width:300px;height:280px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:0;display:none" rows="35" cols="56" ></textarea>
</form>
<input class="bt" type="submit" id="SaveEdit" onclick="saveEdit();" name="" value="Сохранить изменения" style="left:0px;top:348px;width:302px;">


<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en')" name="" value="MP3-en" 
style="left:312px;top:0px;width:40px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en-ru');" name="" value="en-ru" 
style="left:352px;top:0px;width:40px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('en-sp-ru');" name="" value="en-sp-ru" 
style="left:392px;top:0px;width:43px;">
<input class="bt" type="submit" id="SaveEditA" onclick="mp3_f('all');" name="" value="All" 
style="left:435px;top:0px;width:32px;">


<!-- right block button -->
<div  style="position:absolute;left:px;top:22px;">
<div  style="position:absolute;left:315px;top:0px;">
<table class="frame_table" style="left:2px; top:0px; width:145px; height:81px;"><tr><td></td></tr></table>
<div  id="dv" class="capt" style="left:0px; top:5px; width:80px;font-size:12px; font-family:Tahoma;font-size:12px">повторено:</div>
<input id="dLearn" name="level_date" onfocus="keydownuse=2;" onblur="keydownuse=1;" onchange="calcLearn()" value="" style="position:absolute; left:75px; top:5px; width:60px; height:11px; color:#707070; font-size:11px" title="Date" readonly>

<div  class="capt" style="left:0px; top:27px; width:80px;font-size:12px; font-family:Tahoma;font-size:12px">всего:</div>
<input id="wordsPass" value="0" style="position:absolute; left:90px; top:27px; width:40px; height:9px; font-size:12px;text-align:right" title="Колл.пройденных слов"  readonly>

<div  class="capt" style="left:0px; top:43px; width:80px;font-size:12px; font-family:Tahoma;font-size:12px">знаю:</div>
<input id="NRO" value="0" style="position:absolute; left:90px; top:43px; width:40px; height:9px; font-size:12px;text-align:right" title="Колл.пройденных слов"  readonly>

<div  class="capt" style="left:0px; top:59px; width:80px;font-size:12px; font-family:Tahoma;font-size:12px">не знаю:</div>
<input id="NRE" value="0" style="position:absolute; left:90px; top:59px; width:40px; height:9px; font-size:12px;text-align:right" title="Колл.пройденных слов"  readonly>







</div>





<div  style="position:absolute;left:-110px;top:50px; display:block;">

<table class="frame_table" style="left:427px; top:29px; width:145px; height:126px;"><tr><td></td></tr></table>
<table class="frame_table" style="left:427px; top:29px; width:145px; height:261px;"><tr><td></td></tr></table>
<div  class="capt" style="left:445px;top:30px;width:200px;font-size:14px;font-family:Tahoma;text-align:left;">Статистика слова</div>
<div  class="capt" style="left:510px;top:45px;width:200px;font-size:12px;font-family:Tahoma;text-align:left;">Колл-во</div>
<div  class="capt" style="left:430px;top:68px;width:80px;text-align:left;">Знаю подряд</div>
<div  class="capt" style="left:430px;top:98px;width:80px;text-align:left;">Всего знаю</div>
<div  class="capt" style="left:430px;top:128px;width:80px;text-align:left;">Всего не знаю</div>

<input type="text" id="iterOrow" value="0" style="position:absolute;left:510px;top:66px;width:50px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:14px;z-index:6" name="iterOrow" value="" readonly="readonly">

<input type="text" id="iterO" value="0" style="position:absolute;left:510px;top:96px;width:50px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:14px;z-index:7" name="iterO" value="" readonly="readonly">

<input type="text" id="iterE" value="0" style="position:absolute;left:510px;top:127px;width:50px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:14px;z-index:7" name="iterE" value="" readonly="readonly">

<div  class="capt" style="left:390px; top:160px;width:150px;">Изучаемое с </div>

<input type="text" id="date50" value="" style="position:absolute;left:502px;top:158px;width:60px;height:12px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:10px;z-index:6" name="date50" value="" readonly="readonly">

<div id"dvrt" class="capt" style="left:425px;top:185px;width:150px;">Последнее появление</div>

<input type="text" id="LastClick" value="" style="position:absolute;left:435px;top:206px;width:125px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:12px;z-index:6" name="NR0" value="" readonly="readonly">


<input type="text" id="passTime" value="" style="position:absolute;left:435px;top:230px;width:125px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:12px;z-index:6" name="NR0" value="" readonly="readonly">


<input type="text" id="LastA" value="" style="position:absolute;left:435px;top:256px;width:125px;height:15px;text-align:center;border:1px #C0C0C0 solid;font-family:Courier New;font-size:14px;z-index:7" name="NR50" value="" readonly="readonly">



</div>
</div>
</div>


	</body>

 
</html>

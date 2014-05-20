
<?php
setlocale(LC_ALL, 'ru_RU.CP1251');
session_start();
include('../lib/connect_db.php');
$userId=$_SESSION['userId'];
include 'PHP_Text2Speech.class.php'; 
 
 
function encodestring($st)
  {
      
      $st1 =  iconv("UTF-8", "CP1251","абвгдеёзийклмнопрстуфхъыэ_");
      $st2 =  iconv("UTF-8", "CP1251","abvgdeeziyklmnoprstufh'iei");
      $st3 =  iconv("UTF-8", "CP1251","АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_");
      $st4 =  iconv("UTF-8", "CP1251","ABVGDEEZIYKLMNOPRSTUFH'IEI");
      
    // Сначала заменяем "односимвольные" фонемы.
    $st=strtr($st,$st1, $st2);
    $st=strtr($st,$st3, $st4);
    // Затем - "многосимвольные".
    $st=strtr($st, 
                    array(
                        iconv("UTF-8", "CP1251","ж")=>"zh", iconv("UTF-8", "CP1251","ц")=>"ts",
                        iconv("UTF-8", "CP1251", "ч")=>"ch", iconv("UTF-8", "CP1251","ш")=>"sh", 
                        iconv("UTF-8", "CP1251","щ")=>"shch", iconv("UTF-8", "CP1251","ь")=>"", 
                        iconv("UTF-8", "CP1251","ю")=>"yu", iconv("UTF-8", "CP1251","я")=>"ya",
                        iconv("UTF-8", "CP1251","Ж")=>"ZH", iconv("UTF-8", "CP1251","Ц")=>"TS", 
                        iconv("UTF-8", "CP1251","Ч")=>"CH", iconv("UTF-8", "CP1251","Ш")=>"SH", 
                        iconv("UTF-8", "CP1251","Щ")=>"SHCH", "Ь"=>"", iconv("UTF-8", "CP1251","Ю")=>"YU",
                        iconv("UTF-8", "CP1251","Я")=>"YA", iconv("UTF-8", "CP1251","ї")=>"i", 
                        iconv("UTF-8", "CP1251","Ї")=>"Yi", iconv("UTF-8", "CP1251","є")=>"ie", 
                        iconv("UTF-8", "CP1251","Є")=>"Ye"
                        )
             );
    // Возвращаем результат.
    return $st;
  }
 



   
function _strtoupper($string)
{
    $small = array('а','б','в','г','д','е','ё','ж','з','и','й',
                   'к','л','м','н','о','п','р','с','т','у','ф',
                   'х','ч','ц','ш','щ','э','ю','я','ы','ъ','ь',
                   'э', 'ю', 'я');
    $large = array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й',
                   'К','Л','М','Н','О','П','Р','С','Т','У','Ф',
                   'Х','Ч','Ц','Ш','Щ','Э','Ю','Я','Ы','Ъ','Ь',
                   'Э', 'Ю', 'Я');
    return str_replace($small, $large, $string);  
}

 
 
    $t2s = new PHP_Text2Speech; 
//$wordEtmp = 'mock' ;
$wordEtmp = $_GET["wordEA"];
$wordRA = $_GET["wordRA"];
$ch = $_GET["ch"];
$wordE=strtoupper($wordEtmp);  
$wordEtr='eng/'.strtoupper($wordEtmp);  
  if ($wordRA==""){
 $url = 'https://translate.yandex.net/api/v1.5/tr.json/translate?' .
        'key=trnsl.1.1.20140511T060153Z.21a5cb00a6cbec4e.f4e419fa60359a8adce56328118561d1c89fc136&' .
        'text='.$wordEtmp.'&' .
        'lang=ru&' .
        'format=plain&' .
        'options=1'; 
  
    
$curlObject = curl_init();
curl_setopt($curlObject, CURLOPT_URL, $url);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curlObject, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curlObject, CURLOPT_RETURNTRANSFER, true);     

$responseData = curl_exec($curlObject);
$obj = json_decode($responseData);
//$responseData = curl_exec($curlObject);
$wordRA =  $obj->{"text"}[0];
//$wordRtr=encodestring($wordR);
  }

$wordRtr = 'ru/'.encodestring(iconv("UTF-8", "CP1251" , _strtoupper($wordRA)));
$wordR  =  iconv("UTF-8", "CP1251" , _strtoupper($wordRA));
//$t2s->lang="en";



//$wordR=iconv("UTF-8", "CP1251" ,_strtoupper("утка"));

if (!file_exists ('audio/'.$wordEtr.'.mp3'))
 {
 $dd=$t2s->speak($wordE);
 rename($dd, $t2s->audioDir.iconv("UTF-8", "CP1251" , $wordEtr).".mp3");
  file_put_contents('audio/'.$wordEtr.'.mp3',file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/p1.mp3'));
  file_put_contents('audio/'.$wordEtr.'.mp3',file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/p1.mp3'));
  
 }
 

$fileFinish=$wordE.$ch.'.mp3';

if ($ch=="-sp-ru")
{

file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/'.$wordE[0].".mp3"));
for ($i = 1; $i <= strlen($wordE); $i++) {
    
file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/'.$wordE[$i].'.mp3'));
}


file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/p1.mp3'));
file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/p1.mp3'));
 
}

  



if (!file_exists ('audio/'.$wordRtr.'.mp3'))
 {
$t2s->lang="ru";
$dd=$t2s->speak(iconv( "CP1251", "UTF-8",$wordR));
rename($dd, $t2s->audioDir.$wordRtr.".mp3");
file_put_contents($t2s->audioDir.$wordRtr.".mp3",file_get_contents($t2s->audioDir.$wordRtr.".mp3").file_get_contents('audio/p1.mp3'));
file_put_contents($t2s->audioDir.$wordRtr.".mp3",file_get_contents($t2s->audioDir.$wordRtr.".mp3").file_get_contents('audio/p1.mp3'));
 }

file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/'.$wordRtr.".mp3"));
//file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/p1.mp3'));


//file_put_contents('audio/'.$wordE.'-ru.mp3',file_get_contents('audio/'.$wordE.'.mp3').file_get_contents('audio/p1.mp3'));     
file_put_contents('audio/'.$wordE.'-ru.mp3',file_get_contents('audio/'.$wordEtr.'.mp3').file_get_contents('audio/'.$wordRtr.".mp3"));

if ($_GET["ch2"]==1){
$strSQL = 'UPDATE mvdone'. $userId .' SET mvdone'. $userId.'.wordTr="'.$_GET["wordRA"].'" WHERE (((mvdone'. $userId.'.wordE))="'.$wordEtmp.'")';

$res = mysqli_query($link, $strSQL);
}
//file_put_contents('audio/'.$wordE.'-'.iconv("UTF-8", "CP1251" , $wordR).'.mp3',file_get_contents('audio/'.$wordE.'.mp3').file_get_contents('audio/'.iconv("UTF-8", "CP1251" , $wordR).".mp3"));

echo $_GET["wordRA"];
?>

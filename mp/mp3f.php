
<?php
setlocale(LC_ALL, 'ru_RU.CP1251');
include 'PHP_Text2Speech.class.php'; 
 
function encodestring($st)
  {
    // Сначала заменяем "односимвольные" фонемы.
    $st=strtr($st,"абвгдеёзийклмнопрстуфхъыэ_",
    "abvgdeeziyklmnoprstufh'iei");
    $st=strtr($st,"АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_",
    "ABVGDEEZIYKLMNOPRSTUFH'IEI");
    // Затем - "многосимвольные".
    $st=strtr($st, 
                    array(
                        "ж"=>"zh", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", 
                        "щ"=>"shch","ь"=>"", "ю"=>"yu", "я"=>"ya",
                        "Ж"=>"ZH", "Ц"=>"TS", "Ч"=>"CH", "Ш"=>"SH", 
                        "Щ"=>"SHCH","Ь"=>"", "Ю"=>"YU", "Я"=>"YA",
                        "ї"=>"i", "Ї"=>"Yi", "є"=>"ie", "Є"=>"Ye"
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
$wordE=strtoupper($wordEtmp);   
  
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
$wordR = iconv("UTF-8", "CP1251" , _strtoupper($obj->{"text"}[0]));







//$t2s->lang="en";



//$wordR=iconv("UTF-8", "CP1251" ,_strtoupper("утка"));

if (!file_exists ('audio/'.$wordE.'.mp3'))
 {
 $dd=$t2s->speak($wordE);
 rename($dd, $t2s->audioDir.iconv("UTF-8", "CP1251" , $wordE).".mp3");
 }
$fileFinish=$wordE.'-'. $wordR.'_sp.mp3';



file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$wordE.'.mp3').file_get_contents('audio/'.$wordE[0].".mp3"));
for ($i = 1; $i <= strlen($wordE); $i++) {
    
file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/'.$wordE[$i].'.mp3'));
}





if (!file_exists ('audio/'.$wordR.'.mp3'))
 {
$t2s->lang="ru";
$dd=$t2s->speak(iconv( "CP1251", "UTF-8",$wordR));
rename($dd, $t2s->audioDir.$wordR.".mp3");
 }

file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/'.$wordR.".mp3"));
file_put_contents('audio/'.$fileFinish,file_get_contents('audio/'.$fileFinish).file_get_contents('audio/p1.mp3'));


//file_put_contents('audio/'.$wordE.'-'.iconv("UTF-8", "CP1251" , $wordR).'.mp3',file_get_contents('audio/'.$wordE.'.mp3').file_get_contents('audio/'.iconv("UTF-8", "CP1251" , $wordR).".mp3"));

echo iconv("CP1251", "UTF-8", $fileFinish);
?>

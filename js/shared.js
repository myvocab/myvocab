   function mp3_f(ch){
//    alert(WtrArray[rIndex]+"--"+document.getElementById('WordTrs').value);
ch2=0;
if (WtrArray[rIndex]!= document.getElementById('WordTrs').value)
{ch2=1;
WtrArray[rIndex] = document.getElementById('WordTrs').value;
} 
pth="mpf/mp3f.php";
$.get(
  pth,
  { 
    ch: ch,
    ch2: ch2,
    wordEA: document.getElementById('WordEdit').value,
    wordRA: document.getElementById('WordTrs').value
  },
  mp3_fResponse
);  
}

function mp3_fResponse(data){
alert(data);
switch (data.trim()){
  case 'all':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value+".rar"
break
  case 'en-sp-ru':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value+"-sp-ru.mp3"
break 
  case 'en-ru':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value+"-ru.mp3"
break
  case 'en':  
location.href="/mpf/audio/eng/df.php?fd="+document.getElementById('WordEdit').value+".mp3"
break
default:
alert("1")
break
}



}


function madesound(){
//alert (document.getElementById('WordEdit').value);
pth="mpf/msound.php";
$.get(
  pth,
  { 
//     ch: 0, 
     wordEA: document.getElementById('WordEdit').value
   },
  madesoundResponse
);  
}

function madesoundResponse(data){
 //   alert("ff");
 //   alert(data+"ddd");
document.getElementById('mySoundClip').src='mpf/audio/eng/'+data+'.mp3';
var audio = document.getElementById("mySoundClip");
audio.play();  
}  



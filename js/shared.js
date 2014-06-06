   function mp3_f(ch){
//    alert(WtrArray[rIndex]+"--"+document.getElementById('WordTrs').value);
ch2="a";
//alert(WtrSt[idCurr]);


if (WtrArray[rIndex]!= document.getElementById('WordTrs').value)
{ch2="z";
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
chfull = data.trim();
var ch = chfull.split(":");
if(ch[0]=="z"){saveEdit("mute");}

//alert(ch[0]+"ddd"+ch[1]);
switch (ch[1]){
  case 'all':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value+".zip"
break
  case 'en-sp-ru':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value.toUpperCase()+"-sp-ru.mp3"
break 
  case 'en-ru':  
location.href="/mpf/audio/df.php?fd="+document.getElementById('WordEdit').value.toUpperCase()+"-ru.mp3"
break
  case 'en':  
location.href="/mpf/audio/eng/df.php?fd="+document.getElementById('WordEdit').value.toUpperCase()+".mp3"
break
default:
//alert("1")
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


function seekTrans(eWord) {
     var url = "lib/seekTrans.php?eWord="+eWord;
//alert(url);
      request.open("GET", url, true);
      request.onreadystatechange = seekTransResponse;
      request.send(null);   
}


 function seekTransResponse() {

    if (request.readyState == 4){
        
  var tagList = request.responseText.split("@(@");
  alert(request.responseText);
  window.document.WordForm.TextAreaTranslate.value=tagList[1];
  window.document.WordForm.trnsc.value=tagList[0];
  document.getElementById("WordTrs").value=tagList[2];
    }
  } 
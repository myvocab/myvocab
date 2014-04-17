
    var idCurr=0;
    var exemWindowsH;
 //   var HL =0;
    var LastCh=0;

//    var bookWord=1;
//    var bookWordLevel=1;

    var NumberWords = 26;
    var NumberStore = NumberWords;
    var NumberTmp = NumberWords;
    
    var TrnslSt = new Array(NumberStore);
    var TrnscSt = new Array(NumberStore);
    var WESt = new Array(NumberStore);
    var iterE = new Array(NumberStore);
    var iterO = new Array(NumberStore);
    var iterOrow = new Array(NumberStore);
    var dateSt = new Array(NumberStore);
    var lastA = new Array(NumberStore);
    var lastDate = new Array(NumberStore);
    var UnixLD = new Array(NumberStore);
    
//    var beacSt = 1; // 0 - all ??, 1- download all, 2- download 2-th half, 3 - end
//    var beacNSr = 0;   
//    var chKey=0;
    var keydownuse=1;    
    
//    var request = false;
 //   var idSortArray = new Array(NumberWords);
 //   var TrnslArray = new Array(NumberWords);
 //   var TrnscArray = new Array(NumberWords);
 //   var WOArray = new Array(NumberWords);
 //   var beacon = 0;
    
    
    
     request1 = new XMLHttpRequest();
     request2 = new XMLHttpRequest();
     request3 = new XMLHttpRequest();
     request4 = new XMLHttpRequest();
     request5 = new XMLHttpRequest();
     request6 = new XMLHttpRequest();
     request7 = new XMLHttpRequest();
     request8 = new XMLHttpRequest();
     request9 = new XMLHttpRequest();
     request10 = new XMLHttpRequest();
     request11 = new XMLHttpRequest();
     request12 = new XMLHttpRequest();
     request13 = new XMLHttpRequest();
     request14 = new XMLHttpRequest();
     request15 = new XMLHttpRequest();
    
    
    
    
   try {
      request = new XMLHttpRequest();
    } catch (trymicrosoft) {
      try {
        request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (othermicrosoft) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (failed) {
          request = false;
        }
      }
    }

    if (!request)
      alert("Error initializing XMLHttpRequest!"); 
     
  
 
     
      
document.onkeydown = function(event){
events = event || window.event;
//alert(keydownuse);
//alert (document.getElementById('numberInTable').value);
//alert(event.keyCode+'window.event.keyCode');
if (keydownuse==0){keydownuse==1; exit();}


 
 
 if (keydownuse==1 && (events.keyCode == 13  || events.keyCode == 101))
 {
 document.getElementById('dv').focus();
 
 memWordSt(1);
  exit();
 }
 
 
 
 if (keydownuse==1 && (events.keyCode == 98  || events.keyCode == 40))
 {
 document.getElementById('dv').focus();
memWordSt(-1);
  exit();
 }
 
 
 
 
//if ((events.keyCode == 13 || events.keyCode == 101) && chKey==0) {chKey=1;  memWordSt(rIndex+1);}
if (events.keyCode == 39 || events.keyCode == 102) {document.getElementById('trnsl').style.display='block';}
if (events.keyCode == 37 || events.keyCode == 100) {document.getElementById('trnsl').style.display='none';}
//if ((events.keyCode == 38|| events.keyCode ==  104) && chKey==0) {chKey=1;  i= parseInt(document.getElementById("numberInTable").value,10)-1; showWord(i);}
//if ((events.keyCode == 40 || events.keyCode ==  98 ) && chKey==0) {chKey=1; document.getElementById('tc1').focus(); i= parseInt(document.getElementById("numberInTable").value,10)+1; showWord(i);}
}
 
 
 
 
  function fillLearn(ch) {

//if (ch!="start") {bookWord = document.getElementById('numberInTable').value;}
 
 var  url = "lib/compLearnCircuit.php?ch="+ch;
 //   document.getElementById('Done0').checked
    
    
    request.open("GET", url, true);
    request.onreadystatechange = updatePageTo;
    request.send(null);
    }



function updatePageTo() {
  idCurr=1;
   if (request.readyState == 4){
//    alert(request.responseText);  
//document.getElementById('trnsl').value = request.responseText; exit();

    var tagList = request.responseText.split("@(@");

    WESt=tagList[0].split("{{~");
    TrnslSt=tagList[1].split("{{~");
    TrnscSt=tagList[2].split("{{~");
    iterE=tagList[3].split("{{~");
    iterO=tagList[4].split("{{~");
    iterOrow=tagList[5].split("{{~");
    dateSt=tagList[6].split("{{~");
    lastA=tagList[7].split("{{~");
    lastDate=tagList[8].split("{{~");
    UnixLD=tagList[9].split("{{~");
// alert (lastA[0]+" "+lastDate[0]);  
// alert(UnixLD);

  if(WESt.length == 1){alert('у вас нет отмеченных слов, как "ИЗУЧАЕМОЕ"');exit();};
 if(WESt[0]=='start') {showWord(idCurr);calcLearn();};

 //  alert(WESt);
 
       
}     

}



 
 
 
      
 function showWord(id)
{
//alert( dateSt[id]);
var nowdate = new Date();
var d = new Date();
//document.getElementById('trnsl').value = lastA[0];

if(WESt.length < id+1){fillLearn('start');calcLearn();return;};
document.getElementById('WordEdit').value = WESt[id];
document.getElementById('trnsc').value = TrnscSt[id];
document.getElementById('trnsl').value =  TrnslSt[id];


//document.getElementById('trnsl').value = lastA[0];




document.getElementById('iterOrow').value = iterOrow[id];
document.getElementById('iterO').value =  iterO[id];
document.getElementById('iterE').value =  iterE[id];



//document.getElementById('LastClick').value =  lastDate[id].substring(0,16);

document.getElementById('date50').value =  dateSt[id];
//document.getElementById('date50').value =  Date.parse(nowdate)/1000;


//alert(UnixLD[id]);
//document.getElementById('passTime').value =  "прошло дней - "+Math.floor((Date.parse(nowdate)/1000-UnixLD[id])/86400);
nday=Math.floor((Date.parse(nowdate)/1000-UnixLD[id])/86400);
nh=Math.floor((Date.parse(nowdate)/1000-UnixLD[id])/3600);
document.getElementById('passTime').value = "прошло  - "+ nday + " дн."


if (nday==0)
{
   
nh=Math.floor((Date.parse(nowdate)/1000-UnixLD[id])/3600);
 nmin=Math.floor(((Date.parse(nowdate)/1000-UnixLD[id])%3600)/60);
   if (nmin<10)
{document.getElementById('passTime').value = "прошло "+ nh+"ч:0" +nmin+"мин";}
   else
{document.getElementById('passTime').value = "прошло "+ nh+"ч:" +nmin+"мин";}

}
//document.getElementById('passTime').value =  (Date.parse(nowdate)/1000-UnixLD[id]+nowdate.getTimezoneOffset()*60)/86400;



//ddd=parseInt(UnixLD[id], 10) - nowdate.getTimezoneOffset()*60;
ddd=parseInt(UnixLD[id], 10);
d.setTime(ddd*1000);

if (d.getMinutes()<10)
{dmin = "0" +d.getMinutes();}
   else
{dmin = d.getMinutes();}


document.getElementById('LastClick').value = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+dmin;
//document.getElementById('LastClick').value =UnixLD[id];

document.getElementById('LastA').value =  "";
if (lastA[id]==1){
LastCh=1;
document.getElementById('LastA').value =  "ЗНАЮ";
}
if (lastA[id]==-1)
{
LastCh=0;
document.getElementById('LastA').value =  "НЕ ЗНАЮ";    
}
//////if (lastA[id]==0){HL=1;}
//Math.ceil(19276951/86400));
//getHours()  getMonth() getMinutes()
idCurr=id;
//alert(HL);

}
     
  
  
 function calcLearn(){
//alert(document.getElementById("dLearn").value);

 
  pth="lib/calcLearn.php";
 
   $.get(
  pth,
  { 
    dLearn: document.getElementById("dLearn").value
    
  },
  calcLearnResponse
);  
}

 
function calcLearnResponse(data){
  
  var tagNR = data.split("@(@");
//alert(data);
//document.getElementById("NR0").value = tagNR[0];
//document.getElementById("NR50").value = tagNR[1];
//document.getElementById("NR100").value = tagNR[2];
//document.getElementById("NRDel").value = tagNR[3];

document.getElementById("wordsPass").value = tagNR[0];
document.getElementById("NRO").value = tagNR[1];
document.getElementById("NRE").value = tagNR[2];
}
  
  
  
 function chDisplay()
 {
   
   if ((document.getElementById('trnsl').style.display == 'none') )
     {document.getElementById('trnsl').style.display = 'block'}
     else
     {document.getElementById('trnsl').style.display = 'none'};
 }      
      
 


function clExemWindowsH(){
 if (exemWindowsH)  {  exemWindowsH.close(); }
}

function wordHistory(){
chval = document.getElementById("chLearn").value;

cBook = 0;
if (chval=="r"){cBook = 1};
wordE = window.document.WordForm.WordEdit.value;
wordO = document.getElementById("oriWord").value;  
str = "wordhistory.php?wordO=" + wordO + "&wordE=" + wordE+ "&cBook=" + cBook;
exemWindowsH=window.open(str , '_blank');
}
  
function dateNow(){
    var myDate = new Date();
    dd = myDate.getDate();
    mm = myDate.getMonth() + 1;
 if (String(myDate.getMonth() + 1).length==1){mm='0'+(myDate.getMonth() + 1);}
 if (String(myDate.getDate()).length==1){dd='0'+ myDate.getDate();}
 // alert (String(myDate.getDate()).length);
//  document.getElementById("dLevel").value = myDate.getFullYear()+"." + mm + "." + dd;
  document.getElementById("dLearn").value = myDate.getFullYear()+"." + mm + "." + dd;
//  document.getElementById("date50").innerHTML= myDate.getFullYear()+"." + mm + "." + dd;
  
} 
  

  
  
function fillTmp1(){document.getElementById("tmp1").value=WOSt;} 
function fillTmp2(){} 
function fillTmp3(){document.getElementById("tmp2").value=1;}

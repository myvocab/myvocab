
    var i=0;
    var exemWindowsH;

    var bookWord=1;
    var bookWordLevel=1;
    var FlagChangePage = "fcp";
//    var idSt = 0;
    var rIndex = 0;
    var rIndexB = 0;
    var idB = 0;
    var NumberWords = 20;
    var NumberStore = NumberWords;
    var NumberTmp = NumberWords;
    
    var TrnslSt = new Array(NumberStore);
    var TrnscSt = new Array(NumberStore);
    var WOSt = new Array(NumberStore);
    var WESt = new Array(NumberStore);
    var WtrSt = new Array(NumberStore);
    var dateSt = new Array(NumberStore);
    var PrSt = new Array(NumberStore);
    var idSSt = new Array(NumberStore);
    
    var beacSt = 1; // 0 - all ??, 1- download all, 2- download 2-th half, 3 - end
    var beacNSr = 0;   
    var chKey=0;
    var keydownuse=1;    
    
    var request = false;
    var idSortArray = new Array(NumberWords);
    var TrnslArray = new Array(NumberWords);
    var TrnscArray = new Array(NumberWords);
    var WOArray = new Array(NumberWords);
    var WtrArray = new Array(NumberWords);
    var beacon = 0;
    
    
    
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

//alert (document.getElementById('numberInTable').value);
//alert(events.keyCode);
if (keydownuse==0){exit();}
 if (keydownuse==2 && events.keyCode == 13)
 {
 document.getElementById('tc1').focus();
exit();
 }

 
 
 if (keydownuse==3 && (events.keyCode == 13  || events.keyCode == 98 || events.keyCode == 40))
 {
 document.getElementById('trnsc').focus();
  exit();
 }
 
 if (keydownuse==4 && (events.keyCode == 13  || events.keyCode == 98 || events.keyCode == 40))
 {
 document.getElementById('TextAreaTranslate').focus();
  exit();
 }
 
 if (keydownuse==4 && (events.keyCode == 38  || events.keyCode == 104 || events.keyCode == 40))
 {
 document.getElementById('WordEdit').focus();
  exit();
 }
 
 
 
 
if ((events.keyCode == 13 || events.keyCode == 101) && chKey==0) {chKey=1;  document.getElementById('tc1').focus();memWord(rIndex+1);}
if (events.keyCode == 39 || events.keyCode == 102) { document.getElementById('tc1').focus();document.getElementById('TextAreaTranslate').style.display='block';}
if (events.keyCode == 37 || events.keyCode == 100) {document.getElementById('tc1').focus();document.getElementById('TextAreaTranslate').style.display='none';}
if ((events.keyCode == 38|| events.keyCode ==  104) && chKey==0) {chKey=1; document.getElementById('tc1').focus(); i= parseInt(document.getElementById("numberInTable").value,10)-1; showWord(i);}
if ((events.keyCode == 40 || events.keyCode ==  98 ) && chKey==0) {chKey=1; document.getElementById('tc1').focus(); i= parseInt(document.getElementById("numberInTable").value,10)+1; showWord(i);}
}
 
 
 
 
  function fillLearn(ch,chval) {
// alert(ch);

if (ch!="start") {bookWord = document.getElementById('numberInTable').value;}
woCurr=document.getElementById('oriWord').value;
nit = document.getElementById('numberInTable').value; 
 var  url = "lib/fillLearn.php?ch="+ch+"&chval="+chval+"&wocurr="+woCurr+"&nit="+nit;
 //   document.getElementById('Done0').checked
    
    
    request.open("GET", url, true);
    request.onreadystatechange = updatePageTo;
    request.send(null);
    }



function updatePageTo() {
  
if (request.readyState == 4){
//    alert(request.responseText);  
    var tagList = request.responseText.split("@(@");
//    alert(tagList[0]);
    var mvWE=tagList[1].split("{{~");
    var mvID=tagList[0].split("{{~");
    var mvTrnsl=tagList[2].split("{{~");
    var mvTrnsc=tagList[3].split("{{~");
    var mvDate=tagList[4].split("{{~");
    var mvPr=tagList[5].split("{{~");
    var mvWO=tagList[6].split("{{~");
    var mvWTR=tagList[7].split("{{~");

    alert(mvWTR);
 // document.getElementById("dStudy").value = mvDate[0];
  if (parseInt(mvTrnsl[0].charAt(0), 10) == 0){ document.getElementById('PrevPage').disabled = true;
  document.getElementById('PrevIcon').style.display='none';
   document.getElementById('FirstIcon').style.display='none';
  }
   else{ document.getElementById('PrevPage').disabled = false;
   document.getElementById('PrevIcon').style.display='block';
   document.getElementById('FirstIcon').style.display='block';
   }
 
 
 if (parseInt(mvTrnsl[0].charAt(1), 10) == 0){ document.getElementById('NextPage').disabled = true;
 document.getElementById('NextIcon').style.display='none';
 document.getElementById('LastIcon').style.display='none';
 }
 else{ document.getElementById('NextPage').disabled = false;
 document.getElementById('NextIcon').style.display='block';
 document.getElementById('LastIcon').style.display='block';
   
   }     
    
 //    alert( mvPr[0]);
     

  //  document.getElementById("NNewW").value = mvID[0];
 //   document.getElementById("NLernW").value = mvWE[0];
  //  document.getElementById("NDoneW").value = mvTrnsl[0];
 //   document.getElementById("Fflagdel").value = mvTrnsc[0];
    
    
    document.getElementById("NumberRow").innerHTML = mvID[0];
    document.getElementById("CurrRow").innerHTML = mvWE[0];
    document.getElementById("FCurrN").value = mvWE[0];
      
     for (var k = 0; k < NumberWords; k++) {
//        document.getElementById('tc'+idSortArray[k]).value = 'aa';

        document.getElementById("tc"+(k+1)).innerHTML =" ";
        document.getElementById("tc"+(k+1)).style.color="black";
        document.getElementById("tc"+(k+1)).style.background="white";      
        document.getElementById("idS"+(k+1)).innerHTML = " ";
        document.getElementById("idS"+(k+1)).style.background="white";
        document.getElementById("idS"+(k+1)).style.color="black";
        document.getElementById("date"+(k+1)).innerHTML = " ";
        document.getElementById("date"+(k+1)).style.color="black";
        document.getElementById("date"+(k+1)).style.background="white";
        
        TrnslArray[k]=" ";    
        TrnscArray[k]=" ";    
        WOArray[k] = " ";
        WtrArray[k] = " "; 
          }

   //    for (var k = 0; k < mvID.length-1; k++)
     //   alert(mvID.length);
     //  for (var k = 0; k < mvID.length-1; k++) {
       for (var k = 0; k < NumberWords; k++) {
  
    
  
      if (mvWO[0]== mvWO[k+1]){bookWord=k+1;}

              document.getElementById("tc"+(k+1)).innerHTML = mvWE[k+1];
       if(mvPr[k+1]==50){
    document.getElementById("tc"+(k+1)).style.color="blue";
       }
       
       if(mvPr[k+1]==-1){
    document.getElementById("idS"+(k+1)).style.background="black";
    document.getElementById("tc"+(k+1)).style.color="black";
       }
       
       
       
      
       if(mvPr[k+1]==100){
           document.getElementById("tc"+(k+1)).style.color="red";
              }
    if (typeof(mvWE[k+1]) == 'undefined'){
   document.getElementById("date"+(k+1)).style.color="white"; 
   document.getElementById("idS"+(k+1)).style.color="white";
   document.getElementById("tc"+(k+1)).style.color="white"; 
    }
    

    document.getElementById("idS"+(k+1)).innerHTML = mvID[k+1];
    document.getElementById("date"+(k+1)).innerHTML = mvDate[k+1];
    TrnslArray[k]= mvTrnsl[k+1];    
    TrnscArray[k]= mvTrnsc[k+1];    
    WOArray[k] = mvWO[k+1];
    WtrArray[k] = mvWTR[k+1];
       }
//document.getElementById('tmp1').value = "FillLearn - "+WOArray;
if (FlagChangePage=='fcp'){ showWord(bookWord);} 
if (FlagChangePage=='pp'){ showWord(NumberWords);FlagChangePage='fcp'} 
if (FlagChangePage=='np'){ showWord(1);FlagChangePage='fcp';} 
 
 
for (var k = NumberWords; k < NumberWords+NumberStore; k++) {
    aa= parseInt(k,10) - parseInt(NumberWords,10) ;
 // alert(aa);
    TrnslSt[aa]= mvTrnsl[k+1]; 
    TrnscSt[aa]= mvTrnsc[k+1];    
    WOSt[aa] = mvWO[k+1];
    WESt[aa] = mvWE[k+1];
    mvWTR[aa] = mvWTR[k+1];
    dateSt[aa] =  mvDate[k+1];
    PrSt[aa] = mvPr[k+1];
    idSSt[aa] =  mvID[k+1];
 //   alert(WOSt[aa]);
 } 
 beacNSr=0;
chKey=0; 
// alert(WOSt);
document.getElementById("tmp1").value="updatePageTo"+WOSt; 
 calcLev();
 
 
  }
// end request.readyState == 4;
}


function calcLev(){
//alert("calclevelStart");

 
  pth="lib/calcLev.php";
 
   $.get(
  pth,
  { 
    dLearn: document.getElementById("dLevel").value
    
  },
  calcLevResponse
);  
}

 
function calcLevResponse(data){
  
  var tagNR = data.split("@(@");
// alert("calclevelEng");
//document.getElementById("NR0").value = tagNR[0];
//document.getElementById("NR50").value = tagNR[1];
//document.getElementById("NR100").value = tagNR[2];
//document.getElementById("NRDel").value = tagNR[3];

document.getElementById("NWDLevel").value = tagNR[4];
}
 
 
 
 
      
 function showWord(id)
{
 chval = document.getElementById("chLearn").value;
//alert(parseInt(document.getElementById("FCurrN").value, 10)+"  "+id+" "+document.getElementById("NumberRow").innerHTML); 
if ((id < 1) && (parseInt(document.getElementById("FCurrN").value, 10) ==1 )) {chKey=0; return}; 

if (((parseInt(id,10) + parseInt(document.getElementById("FCurrN").value, 10)-1)>parseInt(document.getElementById("NumberRow").innerHTML, 10))) {chKey=0; exit()}; 
 
  
document.getElementById('numberInTablePrev').value=document.getElementById('numberInTable').value;
if (id > NumberWords){FlagChangePage='np';fillLearn('NextPage',chval);  exit();}
if (id < 1){FlagChangePage='pp'; fillLearn('PrevPage',chval); exit();} 

 if (typeof(WOArray[(id-1)]) == 'undefined' ){chKey=0;exit();}
               
 tcN='tc'+id  ;
 
document.getElementById('numberInTable').value=id;

document.getElementById("CurrRow").innerHTML = parseInt(document.getElementById("FCurrN").value, 10) + parseInt(id,10) - 1;
document.getElementById('oriWord').value = WOArray[(id-1)] ;
document.getElementById('WordTrs').value = WtrArray[(id-1)] ;
window.document.WordForm.TextAreaTranslate.value=TrnslArray[(id-1)].replace(/&gt;/gi,">");


document.getElementById('WordEdit').value=document.getElementById('tc'+id).innerHTML.replace("Р�","'");
if (document.getElementById('SWord').checked){madesound();}
window.document.WordForm.trnsc.value=TrnscArray[(id-1)];

document.getElementById("tbn").rows[(rIndex)].cells[1].style.background="white";
document.getElementById("tbn").rows[(rIndex)].cells[2].style.background="white";

document.getElementById("tbn").rows[(id-1)].cells[1].style.background="silver";
document.getElementById("tbn").rows[(id-1)].cells[2].style.background="silver";
//document.getElementById("tbn").rows[(th.rowIndex)].cells[3].style.background="silver";
rIndex=id-1;

if((document.getElementById('numberInTablePrev').value!=document.getElementById('numberInTable').value) || (beacon==1))
{if (document.getElementById('DisplayTr').checked){document.getElementById('TextAreaTranslate').style.display='none';};}   
chKey=0;
//alert('end');
}
     
  
 function chDisplay()
 {
   
   if ((document.getElementById('TextAreaTranslate').style.display == 'none') )
     {document.getElementById('TextAreaTranslate').style.display = 'block';
     document.getElementById('WordTrs').style.display = 'block';
     }
     else
     {document.getElementById('TextAreaTranslate').style.display = 'none';
     document.getElementById('WordTrs').style.display = 'none';
     };
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
  document.getElementById("dLevel").value = myDate.getFullYear()+"." + mm + "." + dd;
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
  
  
  
function fillTmp1(){document.getElementById("tmp1").value=WOSt;} 
function fillTmp2(){} 
function fillTmp3(){document.getElementById("tmp2").value=1;}

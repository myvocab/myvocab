
 //   var i=0;
    var exemWindowsL;
    var exemWindowsH
    var keydownuse=1;
    var bookWord=1;
    var FlagChangePage = "fcp";
//    var idSt = 0;
    var rIndex = 0;
    var rIndexB = 0;
    var idB = 0;
    var NumberWords = 20;
    var NumberStore = NumberWords;
    var NumberTmp = NumberWords;
    var chKey=0;
    var request = false;
    var idSortArray = new Array(NumberWords);
    var TrnslArray = new Array(NumberWords);
    var TrnscArray = new Array(NumberWords);
    var WOArray = new Array(NumberWords);
    var WtrArray = new Array(NumberWords);
    
    var idSSt = new Array(NumberStore);
    var TrnslSt = new Array(NumberStore);
    var TrnscSt = new Array(NumberStore);
    var WOSt = new Array(NumberStore);
    var WESt = new Array(NumberStore);
    var WtrSt = new Array(NumberStore);
    var dateSt = new Array(NumberStore);
    var NPSt = new Array(NumberStore);
    var PrSt = new Array(NumberStore);
    var IterationSt =  new Array(NumberStore);
    var beacSt = 1; // 0 - all Ок, 1- download all, 2- download 2-th half, 3 - end
    var beacNSr = 0;
    
    var countTmp1 = 0;
    var countTmp2 = 0;
    var WOTmp = new Array(NumberTmp);
    var WETmp = new Array(NumberTmp);
    var WtrTmp = new Array(NumberTmp);
    var dateTmp = new Array(NumberTmp);
    var PrTmp = new Array(NumberTmp);
    
    
    
    var useragent=navigator.userAgent;
 for (var k = 0; k <NumberTmp; k++) {WOTmp[k]="";}
 
   
    
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
//alert(keydownuse+" "+events.keyCode);
//alert(events.keyCode);
//alert (document.getElementById('numberInTable').value);
//alert(document.getElementById('tc1').focused);
 if (keydownuse==0){exit();}
 if (keydownuse==3){exit();}
 if (keydownuse==4 && (events.keyCode == 37 || events.keyCode == 39)){exit();}
 if (keydownuse==2 && events.keyCode == 13)
 {
 document.getElementById('tc1').focus();
 document.getElementById('oriWord').value = document.getElementById('sWord').value; 
 fillTable('findword');
 
 //document.getElementById('sWord').focus();
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
 
 
 
 ////////////////////////////////////////////////////////
  if (keydownuse==2){exit();}

 


//if ((events.keyCode == 13 || events.keyCode ==  101) && chKey==0) {chKey=1;document.getElementById('tc1').focus(); setLevel(100);}
//if ((events.keyCode == 37|| events.keyCode ==  100) && chKey==0) {chKey=1;document.getElementById('tc1').focus(); setLevel(0);}
//if ((events.keyCode == 39|| events.keyCode ==  102) && chKey==0) {chKey=1;document.getElementById('tc1').focus(); setLevel(50);}


if ((events.keyCode == 38|| events.keyCode ==  104) && chKey==0) {chKey=1; i= parseInt(document.getElementById("numberInTable").value,10)-1; showWord(i);}
if ((events.keyCode == 40 || events.keyCode ==  98) && chKey==0) {chKey=1; i= parseInt(document.getElementById("numberInTable").value,10)+1; showWord(i);}
}

 
 
 
  function fillTable(ch,chval) {
 //alert(ch);
 deActBt();
if (ch!="start") {bookWord = document.getElementById('numberInTable').value;}
woCurr=document.getElementById('oriWord').value;

nit =document.getElementById('numberInTable').value; 

 var  url = "lib/fillTable.php?ch="+ch+"&chval="+chval+"&wocurr="+woCurr+"&nit="+nit;
 //   document.getElementById('Done0').checked
    
    
    request.open("GET", url, true);
    request.onreadystatechange = updatePageTo;
    request.send(null);
 
/*   
  pth="lib/fillTable.php";
$.ajax({
   type: "GET",
  url: pth,
       data: "ch="+ch+"&chval="+chval+"&wocurr="+woCurr+"&nit="+nit,
      async:true,
  success:  updatePageTo, 
 });
 */
   
  
  }




function updatePageTo(data) {
  
if (request.readyState == 4){
 
 //  if (request.responseText=="stop") {window.open('../index.php'); exit();}
   if (request.responseText=="stop") {window.location='../index.php'; exit();}
  
////     if (data=="stop") {window.location='../index.php'; exit();}
    var tagList = request.responseText.split("@(@");

    //// var tagList = data.split("@(@");
//    alert(tagList[0]);
    var mvWE=tagList[1].split("{{~");
    var mvID=tagList[0].split("{{~");
    var mvTrnsl=tagList[2].split("{{~");
    var mvTrnsc=tagList[3].split("{{~");
    var mvDate=tagList[4].split("{{~");
    var mvPr=tagList[5].split("{{~");
    var mvWO=tagList[6].split("{{~");
    var mvNP=tagList[7].split("{{~");
    var mvIteration=tagList[8].split("{{~");
    var mvWtr=tagList[9].split("{{~");
//document.getElementById('tmp1').value=   mvTrnsl[0];
//alert (mvWtr);   
 if (WOTmp[countTmp2]!=""){setLevelInBases(countTmp2);}
        
//  document.getElementById("dStudy").value = mvDate[0];
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
    
document.getElementById('Done0').checked = parseInt(mvPr[0].charAt(0), 10);   
document.getElementById('Done50').checked = parseInt(mvPr[0].charAt(1), 10);
document.getElementById('Done100').checked = parseInt(mvPr[0].charAt(2), 10);
document.getElementById('flagdel').checked = parseInt(mvPr[0].charAt(3), 10);    
//alert(parseInt(mvPr[0].charAt(4), 10));
if (parseInt(mvPr[0].charAt(4), 10) == 1)
  {document.getElementById('flr').checked = 1;}
else
  {document.getElementById('flp').checked = 1;} 
  
    document.getElementById("NumberRow").innerHTML = mvID[0];
    document.getElementById("CurrRow").innerHTML = mvWE[0];
    document.getElementById("FCurrN").value = mvWE[0];
      
     for (var k = 0; k < NumberWords; k++) {
        document.getElementById("tc"+(k+1)).innerHTML =" ";
        document.getElementById("tc"+(k+1)).style.color="black";
              
        document.getElementById("idS"+(k+1)).innerHTML = " ";
        document.getElementById("idS"+(k+1)).style.background="white";
         document.getElementById("np"+(k+1)).innerHTML = " ";
        document.getElementById("np"+(k+1)).style.background="white";
        document.getElementById("date"+(k+1)).innerHTML = " ";
        TrnslArray[k]=" ";    
        TrnscArray[k]=" ";    
        WOArray[k] = " ";
          }

countT = Math.min(NumberWords, mvID.length-1);

       for (var k = 0; k <countT; k++) {

      if (mvWO[0]== mvWO[k+1]){bookWord=k+1;}

              document.getElementById("tc"+(k+1)).innerHTML = mvWE[k+1];
       if(mvPr[k+1]==50){
    document.getElementById("tc"+(k+1)).style.color="blue";
       }
       
       if(mvPr[k+1]==-1){
    document.getElementById("np"+(k+1)).style.background="black";
    document.getElementById("tc"+(k+1)).style.color="black";
       }
       
       
       
      
       if(mvPr[k+1]==100){
           document.getElementById("tc"+(k+1)).style.color="red";
              }
    document.getElementById("idS"+(k+1)).innerHTML = mvID[k+1];
    document.getElementById("date"+(k+1)).innerHTML = mvDate[k+1];
    document.getElementById("np"+(k+1)).innerHTML = mvNP[k+1];
    document.getElementById("iteration"+(k+1)).innerHTML = mvIteration[k+1];
    
    TrnslArray[k]= mvTrnsl[k+1];    
    TrnscArray[k]= mvTrnsc[k+1];    
    WOArray[k] = mvWO[k+1];  
    WtrArray[k] = mvWtr[k+1];                               
       }
if (FlagChangePage=='fcp'){ showWord(bookWord);} 

if (FlagChangePage=='pp'){ showWord(NumberWords);FlagChangePage='fcp';} 
if (FlagChangePage=='np'){ showWord(1);FlagChangePage='fcp';} 





// for (var k = NumberWords; k < mvID.length-1; k++) {
 for (var k = NumberWords; k < NumberWords+NumberStore; k++) {
    aa= parseInt(k,10) - parseInt(NumberWords,10) ;
 // alert(aa);
    TrnslSt[aa]= mvTrnsl[k+1]; 
    idSSt[aa]= mvID[k+1];
    TrnscSt[aa]= mvTrnsc[k+1];    
    WOSt[aa] = mvWO[k+1];
    WESt[aa] = mvWE[k+1];
    dateSt[aa] =  mvDate[k+1];
    NPSt[aa] = mvNP[k+1];
    PrSt[aa] = mvPr[k+1];
    IterationSt[aa] =  mvIteration[k+1];
    WtrSt[aa] = mvWtr[k+1];
 //   alert(WOSt[aa]);
 } 
//document.getElementById('tmp1').value = WOSt; 
//alert(WOSt);


actBt();

chKey=0;
beacSt = 0;
beacNSr=0;
calcLev();

//fillSt(); 
  }
// end request.readyState == 4;
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
document.getElementById("NR0").value = tagNR[0];
document.getElementById("NR50").value = tagNR[1];
document.getElementById("NR100").value = tagNR[2];
document.getElementById("NRDel").value = tagNR[3];
document.getElementById("NWDLevel").value = tagNR[4];
}
 
 
 
 
 
 
 
 
      
 function showWord(id)
{
 
//alert(PrSt);
// alert(parseInt(document.getElementById("NumberRow").innerHTML, 10)+"  "+id);
if (((parseInt(id,10) + parseInt(document.getElementById("FCurrN").value, 10)-1)>parseInt(document.getElementById("NumberRow").innerHTML, 10))) {chKey=0; return;};

if (id > NumberWords){FlagChangePage='np';fillTable('NextPage'); exit();}
if (id < 1){FlagChangePage='pp'; fillTable('PrevPage'); exit();} 
if (typeof(WOArray[(id-1)]) == 'undefined'){chKey=0; exit();}
if (WOArray[(id-1)] == ' '){chKey=0;exit();}
 
if (typeof(WOArray[(id-1)]) == 'undefined' ){chKey=0;exit();}

document.getElementById('numberInTable').value = id;
document.getElementById("CurrRow").innerHTML = parseInt(document.getElementById("FCurrN").value, 10) + parseInt(id,10) - 1;
document.getElementById('oriWord').value = WOArray[(id-1)] ;
document.getElementById('WordTrs').value = WtrArray[(id-1)] ;

//window.document.WordForm.TextAreaTranslate.value=TrnslArray[(id-1)].replace(/&gt;/gi,">");
window.document.WordForm.TextAreaTranslate.value=TrnslArray[(id-1)];

//document.getElementById('WordEdit').value = document.getElementById('tc'+id).innerHTML.replace("Р�","'");

//document.getElementById('WordEdit').style.color="black";
document.getElementById('WordEdit').value = document.getElementById('tc'+id).innerHTML;
document.getElementById('WordEdit').style.color=document.getElementById('tc'+id).style.color
/*if(PrSt[id]==50){
    document.getElementById('WordEdit').style.color="blue";
       }

       if(mvPr[id]==100){
    document.getElementById('WordEdit').style.color="red";
       }
*/

window.document.WordForm.trnsc.value=TrnscArray[(id-1)];

document.getElementById("tbn").rows[(rIndex)].cells[2].style.background="white";
document.getElementById("tbn").rows[(rIndex)].cells[4].style.background="white";

document.getElementById("tbn").rows[(id-1)].cells[2].style.background="silver";
document.getElementById("tbn").rows[(id-1)].cells[4].style.background="silver";

document.getElementById("nSt").value=parseInt(document.getElementById('CurrRow').innerHTML, 10);
document.getElementById("nFn").value=parseInt(document.getElementById('CurrRow').innerHTML, 10) + 24;

document.getElementById("pageL").value=document.getElementById("tbn").rows[(id-1)].cells[1].innerHTML;
document.getElementById("pageR").value=document.getElementById("tbn").rows[(id-1)].cells[1].innerHTML;


//WordEdit


//document.getElementById("tbn").rows[(th.rowIndex)].cells[3].style.background="silver";
rIndex=id-1;
chKey=0;
//alert('end');
}
     
 
 function compLearn() {  
 dLearn = document.getElementById("dStudy").value;
  pth="lib/compLearn.php";
  $.get(
  pth,
  {
   dLearn: dLearn
  },
  compLearnResponse
);
}     
 
function compLearnResponse(data) {}
 

 function compLearnRange() {  
 nSt = document.getElementById("nSt").value;
 nFn = document.getElementById("nFn").value;
 d0 = document.getElementById("Done0").checked;
 d50 = document.getElementById("Done50").checked;
 d100 = document.getElementById("Done100").checked;
 flagdel = document.getElementById("flagdel").checked;
 flr = document.getElementById("flr").checked;
 pageL = document.getElementById("pageL").value;
 pageR = document.getElementById("pageR").value;
 
  pth="lib/compLearnRange.php";
  $.get(
  pth,
  {
   nSt: nSt,
   nFn: nFn,
   d0: d0,
   d50: d50,
   d100: d100,
   flagdel : flagdel,
   flr : flr,
   pageL : pageL,
   pageR : pageR
   },
  compLearnRangeResponse
);
}     
 
function compLearnRangeResponse(data) {
 //   alert(data);
} 
 
 
 
 
 
 

function clExemWindowsH(){
 if (exemWindowsH)  {  exemWindowsH.close(); }
}

function wordHistory(){
cBook = 1;    
wordE = window.document.WordForm.WordEdit.value;
wordO = document.getElementById("oriWord").value;  
str = "wordhistory.php?wordO=" + wordO + "&wordE=" + wordE+ "&cBook=" + cBook;
exemWindowsH=window.open(str , '_blank');
}

function clExemWindowsL(){
 if (exemWindowsL)  {  exemWindowsL.close(); }
}
function wordsLearn(ch){
//   alert( document.getElementById('flr').checked);
str = "learnwords.php?ch=" + ch;

 exemWindowsL=window.open(str , '_blank');
}


function setCheckLearn(){
flagLearn = document.getElementById("flr").checked;
  pth="lib/setCheckLearn.php";
  $.get(
  pth,
  {
   flagLearn: flagLearn
  },
  setCheckLearnResponse
);    
    
}




function setCheckLearnResponse(){}

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
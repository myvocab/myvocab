//------------------------------------------------
function memWordSt(ch)
{
    keydownuse=1;
  if (document.getElementById('DisplayTr').checked){document.getElementById('trnsl').style.display='none';};   
wordUpd =WESt[idCurr];
chtmp=ch;
//document.getElementById('wordsPass').value = idCurr+1; 
  
 
  
  
  
if(idCurr==NumberWords-1)
  {
//alert(idCurr);
  idCurr = idCurr+1 ;
   }
else
{
  idCurr = idCurr+1 ;
  showWord(idCurr);
 }
 memWord(wordUpd,chtmp);  
 //if(LastCh==ch && HL==0){exit();}
 
  
}


function memWord(wordCurr, chtmp) {


     var url = "lib/setLearnCircuit.php?wordCurr="+wordCurr+"&ch="+chtmp;
// alert(url);
 if (request1.readyState==0 || request1.readyState==4 )
 { request1.open("GET", url, true);request1.onreadystatechange = memWordResponse1;request1.send(null); exit();}
 if (request2.readyState==0 || request2.readyState==4 )
 { request2.open("GET", url, true);request2.onreadystatechange = memWordResponse2;request2.send(null); exit();}
 if (request3.readyState==0 || request3.readyState==4 )
 { request3.open("GET", url, true);request3.onreadystatechange = memWordResponse3;request3.send(null); exit();}
 if (request4.readyState==0 || request4.readyState==4 )
 { request4.open("GET", url, true);request4.onreadystatechange = memWordResponse4;request4.send(null); exit();}
 if (request5.readyState==0 || request5.readyState==4 )
 { request5.open("GET", url, true);request5.onreadystatechange = memWordResponse5;request5.send(null); exit();}
 if (request6.readyState==0 || request6.readyState==4 )
 { request6.open("GET", url, true);request6.onreadystatechange = memWordResponse6;request6.send(null); exit();}
 if (request7.readyState==0 || request7.readyState==4 )
 { request7.open("GET", url, true);request7.onreadystatechange = memWordResponse7;request7.send(null); exit();}
 if (request8.readyState==0 || request8.readyState==4 )
 { request8.open("GET", url, true);request8.onreadystatechange = memWordResponse8;request8.send(null); exit();}
 if (request9.readyState==0 || request9.readyState==4 )
 { request9.open("GET", url, true);request9.onreadystatechange = memWordResponse9;request9.send(null); exit();}
 if (request10.readyState==0 || request10.readyState==4 )
 { request10.open("GET", url, true);request10.onreadystatechange = memWordResponse10;request10.send(null); exit();}
 if (request11.readyState==0 || request11.readyState==4 )
 { request11.open("GET", url, true);request11.onreadystatechange = memWordResponse11;request11.send(null); exit();}
 if (request12.readyState==0 || request12.readyState==4 )
 { request12.open("GET", url, true);request12.onreadystatechange = memWordResponse12;request12.send(null); exit();}
 if (request13.readyState==0 || request13.readyState==4 )
 { request13.open("GET", url, true);request13.onreadystatechange = memWordResponse13;request13.send(null); exit();}
 if (request14.readyState==0 || request14.readyState==4 )
 { request14.open("GET", url, true);request14.onreadystatechange = memWordResponse14;request14.send(null); exit();}
 if (request15.readyState==0 || request15.readyState==4 )
 { request15.open("GET", url, true);request15.onreadystatechange = memWordResponse15;request15.send(null); exit();}

  }

 function memWordResponse1() {
    if (request1.readyState == 4){
 //    alert("ssss  "+request1.responseText);
//   document.getElementById('trnsl').value = request1.responseText; exit();
if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
calcLearn();
   }
 } 

 function memWordResponse2() {
    if (request2.readyState == 4){
   
  if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();
   
    }
 } 
 function memWordResponse3() {
    if (request3.readyState == 4){
  
if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();        
        
    }
 } 


 function memWordResponse4() {
    if (request4.readyState == 4){

if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();
    
    }
 } 
 function memWordResponse5() {
    if (request5.readyState == 4){
if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();        
        
        
        
    }
 } 
 function memWordResponse6() {
    if (request6.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();       
        
    }
 } 
 function memWordResponse7() {
    if (request7.readyState == 4){
  if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();      
    }
 } 
 function memWordResponse8() {
    if (request8.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();       
    }
 } 
 function memWordResponse9() {
    if (request9.readyState == 4){
  if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();      
    }
 } 
 function memWordResponse10() {
    if (request10.readyState == 4){
  if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();      
        
    }
 } 
 function memWordResponse11() {
    if (request11.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();       
        
    }
 } 
 function memWordResponse12() {
    if (request12.readyState == 4){
  if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();      
    }
 } 
 function memWordResponse13() {
    if (request13.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();
    }
 } 
 function memWordResponse14() {
    if (request14.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();
    }
 } 
 function memWordResponse15() {
    if (request15.readyState == 4){
 if(idCurr==NumberWords)
  {
  fillLearn('start');
   }
        calcLearn();
    }
 } 









 
  
 //End ------------------------------------------
 //---------------------------------------------- 
  
function setLevel(nLev) {
 
    bookWordLevel = document.getElementById('numberInTable').value ; 
  cBook = 0;
  dLev = document.getElementById("dLevel").value;
  chLearn = document.getElementById("chLearn").value;
    
   document.getElementById("date"+bookWordLevel).innerHTML =  dLev; 
  
  if(nLev==0){ document.getElementById("tc"+bookWordLevel).style.color="black"; }
  if(nLev==50){ document.getElementById("tc"+bookWordLevel).style.color="blue"; }
  if(nLev==100){ document.getElementById("tc"+bookWordLevel).style.color="red"; }
  
  weLev = document.getElementById("WordEdit").value;
  woLev = WOArray[bookWordLevel-1];
  cBook = 0;
 // alert(nLev+weLev+dLev+woLev);
     var url = "lib/setLevel.php?nLev="+nLev+"&dLev="+dLev+"&weLev="+weLev+"&woLev="+woLev+"&cBook="+cBook+"&chLearn="+chLearn;
  //  alert(url);
     
      request.open("GET", url, true);
      request.onreadystatechange = setLevelResponse;
      request.send(null);   
    
}

 function setLevelResponse() {

    if (request.readyState == 4){
        
     nLev = request.responseText;
 //      fillTable('start'); 
//alert(nLev);
// if ((nLev==0) || (nLev==100)){ memWord(); } 
if (nLev==100){ memWord(bookWordLevel); }
if (nLev==50){showWord(rIndex+2); calcLev(); document.getElementById('tc').focus();}
 //bookmark=document.getElementById('numberInTable').value;      
 //document.getElementById("date"+bookmark).innerHTML =  dLev; 
  //   }

     
 }
 }
 
function seekTrans(eWord) {
     var url = "lib/seekTrans.php?eWord="+eWord;
      request.open("GET", url, true);
      request.onreadystatechange = seekTransResponse;
      request.send(null);   
}


 function seekTransResponse() {

    if (request.readyState == 4){
  var tagList = request.responseText.split("@(@");
  window.document.WordForm.trnsl.value=tagList[1];
  window.document.WordForm.trnsc.value=tagList[0];
    }
  } 
 //End Поиск уже сущест. перевода или в словаре----------------------------------------

 function saveEdit(cha) {
     
 //  bookWord = document.getElementById('numberInTable').value ;   
 tr = window.document.WordForm.trnsl.value;
 eWord = window.document.WordForm.WordEdit.value;
 
 oWord = WESt[idCurr];
 tc = window.document.WordForm.trnsc.value;
 //alert (oWord+tr+eWord+tc);
 pth="lib/saveEdit.php";
 if (cha =="all"){pth="lib/saveEditA.php";} 
//alert("tr="+tr+"&eWord="+eWord+"&oWord="+oWord+"&tc="+tc);
 $.ajax({
   type: "POST",
  url: pth,
    data: "tr="+tr+"&eWord="+eWord+"&oWord="+oWord+"&tc="+tc,
      async:false,
  success:  saveEditResponse, 
 });
}
 
 
 
 function saveEditResponse(data) {
 // alert(data);
 var tagList = data.split("@(@");

    var flag=tagList[0];
    var dtp=tagList[1];
    var pr=tagList[2];
  
  TrnslSt[idCurr] = window.document.WordForm.trnsl.value;
 TrnscSt[idCurr] = window.document.WordForm.trnsc.value;
 WESt[idCurr] = window.document.WordForm.WordEdit.value;     
  
  
 /* 
    if (flag==0){
        
        document.getElementById("tc"+(bookWord)).style.color="black";
        document.getElementById("idS"+(bookWord)).style.background="white";
 
  TrnslArray[bookWord-1] = window.document.WordForm.TextAreaTranslate.value;
  TrnscArray[bookWord-1] = window.document.WordForm.trnsc.value;
  document.getElementById("tc"+bookWord).innerHTML = window.document.WordForm.WordEdit.value;
  document.getElementById("date"+bookWord).innerHTML=dtp;
    if(pr==50){  document.getElementById("tc"+(bookWord)).style.color="blue"; }
    if(pr==-1){
    document.getElementById("idS"+(bookWord)).style.background="black";
    document.getElementById("tc"+(bookWord)).style.color="black";
       }
     if(pr==100){document.getElementById("tc"+(bookWord)).style.color="red";}
 
    
   for (var k = 0; k < (NumberWords-bookWord); k++) {
//     alert("aaa");  
   f=parseInt(bookWord,10)+parseInt(k,10); fn=parseInt(bookWord,10)+parseInt(k,10)+1; 
 
   if(document.getElementById("tc"+fn).innerHTML==document.getElementById("tc"+bookWord).innerHTML)
    { moveUp(fn);exit(); }   
     }
    
    }
 
 
 if (flag==2){moveUp(bookWord);}
 */
   alert("Done!");
 }
 
 
 function delRestore(ch,cha) {
 bookWordLevel =document.getElementById('numberInTable').value   
 //bookWord = document.getElementById('idSort').value ;
  eWord = window.document.WordForm.WordEdit.value;
  pth="lib/delRestore.php";
  if (cha == "all"){pth="lib/delRestoreA.php";}
  
 $.ajax({
   type: "GET",
  url: pth,
    data: "ch="+ch+"&eWord="+eWord,
      async:false,
  success:  delRestoreResponse, 
 }); 
  
  
    
}
 
 function delRestoreResponse(data) { memWord(bookWordLevel); }
  
 
 
 function moveUp(i) {
//chval=document.getElementById('chLearn').value;
// alert(beacNSr);
  for (var k = 0; k < (NumberWords-i); k++) {
   f=parseInt(i,10)+parseInt(k,10); fn=f+1; 
  
  document.getElementById("tc"+f).innerHTML = document.getElementById("tc"+fn).innerHTML; 
   $("#tc"+f).css('color', $("#tc"+fn).css('color')) ;
   $("#tc"+f).css('background-color', $("#tc"+fn).css('background-color')) ;
   
   
   document.getElementById("date"+f).innerHTML = document.getElementById("date"+fn).innerHTML; 
   $("#date"+f).css('color', $("#date"+fn).css('color')) ;
   $("#date"+f).css('background-color', $("#date"+fn).css('background-color')) ;
   
   document.getElementById("idS"+f).innerHTML = document.getElementById("idS"+fn).innerHTML; 
   $("#idS"+f).css('color', $("#idS"+fn).css('color')) ;
   $("#idS"+f).css('background-color', $("#idS"+fn).css('background-color')) ;
   
   document.getElementById("tc"+f).innerHTML = document.getElementById("tc"+fn).innerHTML; 
   document.getElementById("idS"+f).innerHTML = document.getElementById("idS"+fn).innerHTML; 
   document.getElementById("date"+f).innerHTML = document.getElementById("date"+fn).innerHTML; 
  
   TrnslArray[f-1] = TrnslArray[fn-1];
   TrnscArray[f-1] = TrnscArray[fn-1];
   WOArray[f-1] = WOArray[fn-1];
  }

  
  
  
  
  TrnslArray[NumberWords-1]= TrnslSt[beacNSr];    
    TrnscArray[NumberWords-1]= TrnscSt[beacNSr];    
    WOArray[NumberWords-1] = WOSt[beacNSr];
    
        document.getElementById("tc"+NumberWords).innerHTML =" ";
        document.getElementById("tc"+NumberWords).style.color="black";
        document.getElementById("idS"+NumberWords).innerHTML = " ";
        document.getElementById("idS"+NumberWords).style.background="white";
        document.getElementById("date"+NumberWords).innerHTML = " ";
        document.getElementById("date"+NumberWords).style.background="white";  
    
    
  
 if (typeof(WESt[beacNSr]) == 'undefined'){
   document.getElementById("date"+(NumberWords)).style.color="white"; 
   document.getElementById("idS"+(NumberWords)).style.color="white";
   document.getElementById("tc"+(NumberWords)).style.color="white";  
 } 
  
   
 document.getElementById("NumberRow").innerHTML = parseInt(document.getElementById("NumberRow").innerHTML,10)-1; 
 
 // if(typeof(WOSt[beacNSr])=="undefined"){ showWord(bookWord); exit();} 
 
  document.getElementById("tc"+NumberWords).innerHTML = WESt[beacNSr];
       if(PrSt[beacNSr]==50){
    document.getElementById("tc"+NumberWords).style.color="blue";
       }
       
       if(PrSt[beacNSr]==-1){
    document.getElementById("idS"+NumberWords).style.background="black";
    document.getElementById("idS"+NumberWords).style.color="black";
       }
       
       if(PrSt[beacNSr]==100){
           document.getElementById("tc"+NumberWords).style.color="red";
              }
//    document.getElementById("idS"+NumberWords).innerHTML = mvID[k+1];
 
    document.getElementById("date"+NumberWords).innerHTML = dateSt[beacNSr];
  document.getElementById("idS"+NumberWords).innerHTML = idSSt[beacNSr];
 CR =  parseInt(document.getElementById("CurrRow").innerHTML,10);
 NR = parseInt(document.getElementById("NumberRow").innerHTML,10);
 BW = parseInt (bookWord,10);
 
 
 //if((NR+1)==CR){bookWord=bookWord-1;}
   if (NR==0)
 {
 window.document.WordForm.trnsc.value="";
 document.getElementById('WordEdit').value="";
 window.document.WordForm.TextAreaTranslate.value="";
//document.getElementById("NumberInTable").value =0;
document.getElementById("CurrRow").innerHTML =0;
exit();
 } 

 

  showWord(bookWord);  
  
  
  beacNSr =   beacNSr+1;
//document.getElementById('tmp2').value = "FillLearnSt  = "+WOSt + "  " + beacNSr;

//alert(beacNSr+"-"+NumberStore/2);



if  (beacNSr>=(NumberStore/2 )){

for (var k = 0; k < (NumberStore/2 ); k++) {   
    TrnslSt[k] = TrnslSt[k+(NumberStore/2 )];
    TrnscSt[k] = TrnscSt[k+(NumberStore/2 )];
    WOSt[k] = WOSt[k+(NumberStore/2 )];
    
    WESt[k] = WESt[k+(NumberStore/2 )];
    dateSt[k] = dateSt[k+(NumberStore/2 )];
    PrSt[k] = PrSt[k+(NumberStore/2 )];
    idSSt[k] = idSSt[k+(NumberStore/2 )];
 }
 fillTmp1()
 //WESt[(NumberStore/2 +1 )]="12121";
//document.getElementById('tmp1').value = "WESt[(NumberStore/2 +1 )]=" + WESt[(NumberStore/2 +1 )];
//document.getElementById('tmp3').value = "FillLearnSt  = "+WOSt + idSSt + "  " + beacNSr;
  beacNSr = 0;
//alert("fillSt");   
fillSt();
fillTmp2();
}

}



function fillSt(){
 //   alert(WOSt[NumberStore-1]);
    chval = document.getElementById('chLearn').value;
  pth="lib/fillLearnSt.php";
$.ajax({
   type: "GET",
  url: pth,
    data: "WO="+WOSt[NumberStore-1]+"&chval="+chval,
      async:true,
  success:  fillStResponse, 
 });
}


function fillStResponse(data) {
 //   alert(data);
    var tagList = data.split("@(@");
//   alert(tagList[0]);
 
    var mvWE=tagList[1].split("{{~");
    var mvTrnsl=tagList[2].split("{{~");
    var mvTrnsc=tagList[3].split("{{~");
    var mvDate=tagList[4].split("{{~");
    var mvPr=tagList[5].split("{{~");
    var mvWO=tagList[6].split("{{~");
    var mvNP=tagList[0].split("{{~");
   
                                       
 
 for (var k = NumberStore/2 ; k < NumberStore; k++) {
 //    alert(mvWO[k+1 -NumberStore/2]);
    TrnslSt[k]= mvTrnsl[k+1 -NumberStore/2];    
    TrnscSt[k]= mvTrnsc[k+1 -NumberStore/2];    
    WOSt[k] = mvWO[k+1 -NumberStore/2];
    WESt[k] = mvWE[k+1 -NumberStore/2];
    dateSt[k] =  mvDate[k+1 -NumberStore/2];
    idSSt[k] = mvNP[k+1 -NumberStore/2];
    PrSt[k] = mvPr[k+1 -NumberStore/2];
 //  alert(2);     
 fillTmp1(); 
   
 } 
 
//  beacSt=0;  
//document.getElementById('tmp2').value = "FillLearnSt  = "+WOSt + idSSt + "  " + beacNSr;
 
}








function randWords(){
    
    
    
}

